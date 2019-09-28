<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 8:26
 */

namespace App\Services\Uploader;

use App\Services\Uploader\Uploaders\LocalUploader;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class UploaderServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UploaderInterface::class,
            LocalUploader::class
        );

        $this->app->singleton(
            LocalUploader::class,
            function (Application $application) {
                return new LocalUploader(config('app.url'));
            }
        );
    }
}
