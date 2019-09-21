<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:11
 */

namespace App\Modules\Category;

use App\Modules\Category\Repositories\CategoryRepository\CategoryRepository;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Modules\Category\Services\CategoryService\CategoryService;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            CategoryServiceInterface::class,
            CategoryService::class
        );
    }
}
