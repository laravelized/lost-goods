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
        $route->get('/', 'ShowDashboardPageHandler')
            ->name('admin.dashboard.index');

        $route->group(['prefix' => 'category'], function ($route) {
            $route->get('/', 'Category\ShowIndexPageHandler')
                ->name('admin.dashboard.category.index');
            $route->get('/create', 'Category\ShowCreateCategoryFormHandler')
                ->name('admin.dashboard.category.create.form');
            $route->post('/create', 'Category\CreateCategoryHandler')
                ->name('admin.dashboard.category.create');
        });
    });
});