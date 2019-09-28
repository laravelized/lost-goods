<?php

Route::group(['namespace' => 'User'], function ($route) {

    $route->get('/', 'ShowIndexPageHandler')
        ->name('user.index');

    $route->get('/register', 'Auth\ShowRegisterFormHandler')
        ->name('user.register.form');
    $route->post('/register', 'Auth\RegisterHandler')
        ->name('user.register');

    $route->get('/login', 'Auth\ShowLoginFormHandler')
        ->name('user.login.form');
    $route->post('/login', 'Auth\LoginHandler')
        ->name('user.login');

    $route->post('/logout', 'LogoutHandler')
        ->name('user.logout');

    $route->get('/founds/my/list', 'Found\ShowUserFoundsListHandler')
        ->name('user.founds.my.list');
    $route->get('/founds/my/create', 'Found\ShowPostFoundFormHandler')
        ->name('user.founds.my.post.form');
    $route->post('/founds/my/create', 'Found\PostFoundHandler')
        ->name('user.founds.my.post');
});