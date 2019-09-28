<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 12:14
 */

namespace App\Services\StringService;

use Illuminate\Support\ServiceProvider;

class StringServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            StringServiceInterface::class,
            StringService::class
        );
    }
}
