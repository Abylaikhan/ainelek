<?php

namespace App\Http\ViewComposers;

use App\Models\Contact;
use App\Models\Page;
use Illuminate\View\View;

class NavigationComposer
{
    public function compose(View $view)
    {
        $phone     = Contact::query()->where('type_id', Contact::TYPE_PHONE)->first();
        $whatsapp  = Contact::query()->where('type_id', Contact::TYPE_WHATSAPP)->first();
        $email     = Contact::query()->where('type_id', Contact::TYPE_EMAIL)->first();
        $address   = Contact::query()->where('type_id', Contact::TYPE_ADDRESS)->first();
        $instagram = Contact::query()->where('type_id', Contact::TYPE_INSTAGRAM)->first();
        $about     = Page::query()->find(1);

        $view->with('whatsapp', $whatsapp)
            ->with('phone', $phone)
            ->with('email', $email)
            ->with('instagram', $instagram)
            ->with('address', $address)
            ->with('about', $about);
    }
}
