<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Throwable;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $reviews = Review::latest()->paginate(10);

        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.reviews.create');
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
            'text' => 'required|max:500',
        ]);

        Review::create($request->all());

        session()->flash('success', __('Отзыв успешно создан'));

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Review $review
     * @return Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Review $review
     * @return Application|Factory|View
     */
    public function edit(Review $review)
    {
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Review $review
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(Request $request, Review $review)
    {
        $this->validate($request, [
            'full_name' => 'required|max:255',
            'text' => 'required|max:500',
        ]);

        $review->update($request->all());

        session()->flash('success', __('Отзыв успешно изменен!'));

        return redirect()->route('admin.reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Review $review
     * @return RedirectResponse
     * @throws Throwable
     */
    public function destroy(Review $review): RedirectResponse
    {
        $deleted = $review->delete();

        session()->flash('success', __('Отзыв успешно удален!'));

        return redirect()->route('admin.reviews.index');
    }
}
