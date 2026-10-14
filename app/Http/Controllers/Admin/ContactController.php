<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('admin.contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.contacts.create')
            ->with('types', Contact::types());
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
            'content' => 'required|max:2000',
            'type_id' => 'required',
        ]);


        Contact::create($request->all());

        session()->flash('success', __('Контакт успешно создан'));

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return Application|Factory|View
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.edit', compact('contact'))
            ->with('types', Contact::types());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Contact $contact
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Contact $contact)
    {
        $this->validate($request, [
            'content' => 'required|max:2000',
            'type_id' => 'required',
        ]);

        $contact->update($request->all());

        session()->flash('success', __('Контакт успешно изменен!'));

        return redirect()->route('admin.contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $deleted = $contact->delete();

        session()->flash('success', __('Контакт успешно удален!'));

        return redirect()->route('admin.contacts.index');
    }
}
