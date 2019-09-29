<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:11
 */

namespace App\Modules\Category;

use App\Modules\Category\Policies\CategoryPolicy;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepository;
use App\Modules\Category\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Modules\Category\Services\CategoryService\CategoryService;
use App\Modules\Category\Services\CategoryService\CategoryServiceInterface;
use App\Modules\Permissions\Permissions;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Gate::define(Permissions::CREATE_CATEGORY, CategoryPolicy::class . '@create');
        Gate::define(Permissions::VIEW_CATEGORIES_LIST, CategoryPolicy::class . '@viewCategoriesList');
        Gate::define(Permissions::UPDATE_CATEGORY, CategoryPolicy::class . '@update');
        Gate::define(Permissions::DELETE_CATEGORY, CategoryPolicy::class . '@delete');
    }

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
