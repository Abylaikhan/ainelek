<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Throwable;

class BlogController extends Controller
{
    protected $path = 'public/blogs';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.blogs.create');
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
            'title' => 'required|max:255',
            'keywords' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 800, 500);
        }

        Blog::create($data);

        session()->flash('success', __('Блог успешно создан'));

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Blog $blog
     * @return Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Blog $blog
     * @return Application|Factory|View
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Blog $blog
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Blog $blog)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'keywords' => 'required|max:255',
            'description' => 'required|max:255',
            'content' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();
        $data['is_interesting'] = $data['is_interesting'] ?? 0;

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 800, 500);
        }

        $blog->update($data);

        session()->flash('success', __('Блог успешно изменен!'));

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Blog $blog
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Blog $blog): RedirectResponse
    {
        $deleted = $blog->delete();

        session()->flash('success', __('Блог успешно удален!'));

        return redirect()->route('admin.blogs.index');
    }
}
