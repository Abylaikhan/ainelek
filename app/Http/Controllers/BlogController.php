<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::query()->latest()->paginate(9);

        return view('blogs.index', compact('blogs'));
    }

    public function show($slug): Factory|View|Application
    {
        $blog = Blog::query()->where('slug', $slug)->firstOrFail();
        $latestBlog = Blog::query()->whereNot('slug', $slug)->limit(6)->get();
        $blog->update(['views' => $blog->views + 1]);
        return view('blogs.show', compact('blog', 'latestBlog'));
    }
}
