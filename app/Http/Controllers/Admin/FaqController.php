<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.faqs.create');
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
            'question' => 'required|max:1000',
            'answer' => 'required',
        ]);

        Faq::create($request->all());

        session()->flash('success', __('FAQ успешно создан'));

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Faq $faq
     * @return Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Faq $faq
     * @return Application|Factory|View
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Faq $faq
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Faq $faq)
    {
        $this->validate($request, [
            'question' => 'required|max:1000',
            'answer' => 'required',
        ]);

        $faq->update($request->all());

        session()->flash('success', __('FAQ успешно изменен!'));

        return redirect()->route('admin.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Faq $faq
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Faq $faq): RedirectResponse
    {
        $deleted = $faq->delete();

        session()->flash('success', __('FAQ успешно удален!'));

        return redirect()->route('admin.faqs.index');
    }
}
