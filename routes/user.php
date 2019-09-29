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
    $route->get('/founds/{lostGoodId}/questions', 'Found\ShowQuestionsListHandler')
        ->name('user.founds.questions.list');
    $route->get('/founds/{lostGoodId}/questions/create', 'Found\ShowCreateQuestionFormHandler')
        ->name('user.founds.questions.create.form');
    $route->post('/founds/{lostGoodId}/questions/create', 'Found\CreateQuestionHandler')
        ->name('user.founds.questions.create');
    $route->get('/question/{questionId}/update', 'Found\ShowUpdateQuestionFormHandler')
        ->name('user.question.update.form');
    $route->post('/question/{questionId}/update', 'Found\UpdateQuestionHandler')
        ->name('user.question.update');
    $route->post('/question/{questionId}/delete', 'Found\DeleteQuestionHandler')
        ->name('user.question.delete');
});