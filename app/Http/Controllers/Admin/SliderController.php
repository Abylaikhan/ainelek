<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class SliderController extends Controller
{
    protected $path = 'public/sliders';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);

        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'nullable|max:1000',
            'link'        => 'nullable|max:255',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path);
        }

        Slider::create($data);

        session()->flash('success', __('Фотография успешно создана'));

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Slider $slider
     * @return Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return Application|Factory|View
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Slider $slider
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'nullable|max:1000',
            'link'        => 'nullable|max:255',
            'image'       => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path);
        }

        $slider->update($data);

        session()->flash('success', __('Фотография успешно изменена!'));

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        $deleted = $slider->delete();

        session()->flash('success', __('Фотография успешно удалена!'));

        return redirect()->route('admin.sliders.index');
    }
}
