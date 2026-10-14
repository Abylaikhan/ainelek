<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class StaffController extends Controller
{
    protected $path = 'public/staff';

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $staffs = Staff::latest()->paginate(10);

        return view('admin.staff.index', compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.staff.create');
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
            'full_name' => 'required|max:255',
            'position'  => 'nullable|max:255',
            'image'     => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 400, 400);
        }

        Staff::create($data);

        session()->flash('success', __('Фотография успешно создана'));

        return redirect()->route('admin.staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Staff $staff
     * @return Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Staff $staff
     * @return Application|Factory|View
     */
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Staff $staff
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Staff $staff)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'position'  => 'nullable|max:255',
            'image'       => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:4096',
        ]);

        $data = $request->all();

        if ($file = $request->file('image')) {
            $data['image'] = FileHelper::save($file, $this->path, 400, 400);
        }

        $staff->update($data);

        session()->flash('success', __('Персонал успешно изменен!'));

        return redirect()->route('admin.staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Staff $staff
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Staff $staff): RedirectResponse
    {
        $deleted = $staff->delete();

        session()->flash('success', __('Персонал успешно удален!'));

        return redirect()->route('admin.staff.index');
    }
}
