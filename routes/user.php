<?php

Route::group(['namespace' => 'User'], function ($route) {
    $route->get('/', 'ShowIndexPageHandler')
        ->name('user.index');
    $route->get('/register', 'Auth\ShowRegisterFormHandler')
        ->name('user.register.form');
    $route->get('/login', 'Auth\ShowLoginFormHandler')
        ->name('user.login.form');
});