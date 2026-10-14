<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
//            [
//                'title' => 'Баннеров',
//                'link' => route('admin.banners.index'),
//                'icon' => 'far fa-images',
//                'bg' => 'bg-warning',
//                'count' => Banner::all()->count()
//            ],
//            [
//                'title' => 'Контакты',
//                'link' => route('admin.addresses.index'),
//                'icon' => 'fas fa-store',
//                'bg' => 'bg-info',
//                'count' => Address::all()->count()
//            ],
//            [
//                'title' => 'Страниц',
//                'link' => route('admin.pages.index'),
//                'icon' => 'fas fa-newspaper',
//                'bg' => 'bg-dark',
//                'count' => Page::all()->count()
//            ]
        ];

        session()->flash('success', __('Страница успешно загружена!'));
        return view('admin.home', compact('data'));
    }

}
