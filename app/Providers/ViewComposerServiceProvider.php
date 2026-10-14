<?php

namespace App\Providers;

use App\Http\ViewComposers\NavigationComposer;
use Illuminate\Support\ServiceProvider;
use function view;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.app', NavigationComposer::class);
    }
}
