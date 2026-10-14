<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Advantage;
use App\Models\Service;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class AjaxController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function reorder(Request $request): JsonResponse
    {
        $input = $request->all();

        $ids = [];

        foreach ($input['data'] as $val) {
            $id    = str_replace('tr-', '', $val);
            $ids[] = $id;
        }

        $index = 0;

        foreach ($ids as $id) {
            if ($index >= 300) break;

            $item = null;

            if ($input['model'] == 'Service') {
                $item = Service::query()->whereId($id)->first();
            } else if ($input['model'] == 'Advantage') {
                $item = Advantage::query()->whereId($id)->first();
            }
            if ($item == null) continue;

            $item->order_id = $index + 1;
            $item->save();

            $index += 1;
        }

        return response()->json(['success' => true]);
    }

    public function deleteFile(Request $request): JsonResponse
    {
        $input = $request->all();

        if ($input['model']) {
            $modelName     = $input['model'];
            $fullClassName = "\\App\\Models\\{$modelName}";
            $modelInstance = App::make($fullClassName);

            $item = $modelInstance::query()->find($input['id']);
            $itemArr = $item->toArray();

            if (Storage::exists($itemArr[$input['attribute']])) {
                Storage::delete($itemArr[$input['attribute']]);
                $item->update([$input['attribute'] => null]);
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false]);
    }

}
