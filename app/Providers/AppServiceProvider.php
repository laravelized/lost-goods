<?php

namespace App\Providers;

use App\ViewComposers\NavbarViewComposer;
use App\ViewComposers\SidemenuViewComposer;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Pusher\Pusher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Pusher::class, function (Application $application) {
            $options = [
                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                'useTLS' => true
            ];

            $pusher = new Pusher(
                '0e5a5c57cfd49d6e0dbe',
                '18b8877320cef4835fe2',
                '881386',
                $options
            );

            $pusher = new Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                $options
            );

            return $pusher;
        });
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
