<?php

namespace App\Providers;

use App\ViewComposers\NavbarViewComposer;
use App\ViewComposers\SidemenuViewComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'user.components.sidemenu',
            SidemenuViewComposer::class
        );

        View::composer(
            'user.components.navbar',
            NavbarViewComposer::class
        );
    }
}
