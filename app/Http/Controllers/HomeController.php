<?php

namespace App\Http\Controllers;

use App\Models\Advantage;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\Review;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Staff;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'sliders'    => Slider::all(),
            'about'      => Page::query()->find(1),
            'services'   => Service::all(),
            'advantages' => Advantage::all(),
            'galleries'  => Gallery::query()->limit(6)->latest()->get(),
            'blogs'      => Blog::query()->limit(3)->latest()->get(),
            'reviews'    => Review::all()
        ]);
    }

    public function faq()
    {
        return view('faq', [
            'faqs' => Faq::all()
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'phone'     => Contact::query()->where('type_id', Contact::TYPE_PHONE)->first(),
            'address'   => Contact::query()->where('type_id', Contact::TYPE_ADDRESS)->first(),
            'email'     => Contact::query()->where('type_id', Contact::TYPE_EMAIL)->first(),
            'instagram' => Contact::query()->where('type_id', Contact::TYPE_EMAIL)->first(),
            'map'       => Contact::query()->where('type_id', Contact::TYPE_MAP)->first()
        ]);
    }

    public function about()
    {
        return view('about', [
            'about'      => Page::query()->find(1),
            'services'   => Service::all(),
            'advantages' => Advantage::all(),
            'staffs'     => Staff::all(),
        ]);
    }

}
