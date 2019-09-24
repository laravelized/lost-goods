<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function ($route) {
    $route->get('/login', 'Auth\ShowLoginFormHandler')
        ->name('admin.login.form');
    $route->post('/login', 'Auth\LoginHandler')
        ->name('admin.login');

    $route->group([
        'prefix' => 'dashboard',
        'middleware' => [
            'auth.admin',
            'can:' . \App\Modules\Permissions\Permissions::ACCESS_ADMIN_DASHBOARD
        ],
        'namespace' => 'Dashboard'
    ], function ($route) {

        $route->post('/logout', 'LogoutHandler')
            ->name('admin.dashboard.logout');

        $route->get('/', 'ShowDashboardPageHandler')
            ->name('admin.dashboard.index');

        $route->group(['prefix' => 'category'], function ($route) {
            $route->get('/', 'Category\ShowIndexPageHandler')
                ->name('admin.dashboard.category.index');
            $route->get('/create', 'Category\ShowCreateCategoryFormHandler')
                ->name('admin.dashboard.category.create.form');
            $route->post('/create', 'Category\CreateCategoryHandler')
                ->name('admin.dashboard.category.create');
            $route->get('/update/{categoryId}', 'Category\ShowUpdateCategoryFormHandler')
                ->name('admin.dashboard.category.update.form');
            $route->post('/update/{categoryId}', 'Category\UpdateCategoryHandler')
                ->name('admin.dashboard.category.update');
            $route->post('/delete/{categoryId}', 'Category\DeleteCategoryHandler')
                ->name('admin.dashboard.category.delete');
        });
    });
});