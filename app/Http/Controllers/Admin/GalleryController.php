<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class GalleryController extends Controller
{
    protected $path = 'public/galleries';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.galleries.create');
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
            'image'       => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 800, 600);
        }

        Gallery::create($data);

        session()->flash('success', __('Изображениие успешно добавлено!'));

        return redirect()->route('admin.galleries.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Gallery $gallery
     * @return Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Gallery $gallery
     * @return Application|Factory|View
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Gallery $gallery
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'image'       => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 800, 600);
        }

        $gallery->update($data);

        session()->flash('success', __('Изображениие успешно изменено!'));

        return redirect()->route('admin.galleries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Gallery $gallery
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        $gallery->delete();

        session()->flash('success', __('Изображениие успешно удалено!'));

        return redirect()->route('admin.galleries.index');
    }
}
