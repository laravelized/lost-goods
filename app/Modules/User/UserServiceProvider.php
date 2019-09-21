<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 12:06
 */

namespace App\Modules\User;

use App\Modules\User\Repositories\UserRepository\UserRepository;
use App\Modules\User\Repositories\UserRepository\UserRepositoryInterface;
use App\Modules\User\Services\UserService\UserService;
use App\Modules\User\Services\UserService\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            UserServiceInterface::class,
            UserService::class
        );
    }
}
