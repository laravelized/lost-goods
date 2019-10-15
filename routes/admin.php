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

        $route->group(['prefix' => 'users'], function ($route) {
            $route->get('/', 'User\ShowUsersListHandler')
                ->name('admin.dashboard.user.index');
            $route->post('/{userId}/delete', 'User\DeleteUserHandler')
                ->name('admin.dashboard.user.delete');
        });

        $route->group(['prefix' => 'lostgood'], function ($route) {
            $route->post('/{lostGoodId}/delete', 'Lostgood\DeleteLostGoodHandler')
                ->name('admin.dashboard.lostgood.delete');
            $route->get('/{lostGoodId}/update', 'Lostgood\ShowUpdateLostGoodFormHandler')
                ->name('admin.dashboard.lostgood.update.form');
        });

        $route->group(['prefix' => 'losts'], function ($route) {
            $route->get('/', 'Lostgood\ShowLostsListHandler')
                ->name('admin.dashboard.losts.index');
            $route->post('/{lostGoodId}/update', 'Lostgood\UpdateLostHandler')
                ->name('admin.dashboard.losts.update');
        });

        $route->group(['prefix' => 'founds'], function ($route) {
            $route->get('/', 'Lostgood\ShowFoundsListHandler')
                ->name('admin.dashboard.founds.index');
            $route->post('/{lostGoodId}/update', 'Lostgood\UpdateFoundHandler')
                ->name('admin.dashboard.founds.update');
        });

        $route->group(['prefix' => 'profile'], function ($route) {
            $route->get('/', 'Profile\ShowIndexPageHandler')
                ->name('admin.profile.index');
            $route->post('/', 'Profile\ChangeProfileHandler')
                ->name('admin.profile.index.change-profile');
        });
    });
});