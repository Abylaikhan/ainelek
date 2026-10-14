<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $services = Service::latest()->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.services.create');
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
            'title' => 'required|max:50',
        ]);

        Service::create($request->all());

        session()->flash('success', __('Услуга успешно создана!'));

        return redirect()->route('admin.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Service $service
     * @return Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Application|Factory|View
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Service $service
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
        ]);

        $service->update($request->all());

        session()->flash('success', __('Услуга успешно изменена!'));

        return redirect()->route('admin.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Service $service): RedirectResponse
    {
        $deleted = $service->delete();

        session()->flash('success', __('Услуга успешно удалена!'));

        return redirect()->route('admin.services.index');
    }

    public function search(Request $request)
    {
        if($request->searchTerm){
            $query = Service::select(['id', 'title as text'])->where('title', 'LIKE', "%{$request->searchTerm}%");
        }else{
            $query = Service::select(['id', 'title as text']);
        }
        return response()->json($query->latest()->get());

    }
}
