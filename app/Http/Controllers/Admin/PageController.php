<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'content' => 'required',
        ]);

        Page::create($request->all());

        session()->flash('success', __('Страница успешно создана'));

        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Page $page)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $page->update($request->all());

        session()->flash('success', __('Страница успешно изменена!'));

        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Page $page): RedirectResponse
    {
        $deleted = $page->delete();

        session()->flash('success', __('Страница успешно удалена!'));

        return redirect()->route('admin.pages.index');
    }
}
