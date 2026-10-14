<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Advantage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Throwable;

class AdvantageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $advantages = Advantage::latest()->paginate(10);

        return view('admin.advantages.index', compact('advantages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.advantages.create');
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
            'description' => 'required|max:255',
        ]);

        Advantage::create($request->all());

        session()->flash('success', __('Преимущество успешно создано!'));

        return redirect()->route('admin.advantages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Advantage $advantage
     * @return Response
     */
    public function show(Advantage $advantage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Advantage $advantage
     * @return Application|Factory|View
     */
    public function edit(Advantage $advantage)
    {
        return view('admin.advantages.edit', compact('advantage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Advantage $advantage
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Advantage $advantage)
    {
        $this->validate($request, [
            'title'       => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        $advantage->update($request->all());

        session()->flash('success', __('Преимущество успешно изменено!'));

        return redirect()->route('admin.advantages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advantage $advantage
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Advantage $advantage): RedirectResponse
    {
        $deleted = $advantage->delete();

        session()->flash('success', __('Преимущество успешно удалено!'));

        return redirect()->route('admin.advantages.index');
    }
}
