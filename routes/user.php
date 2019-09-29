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

    $route->get('/founds/my/list', 'Found\My\ShowUserFoundsListHandler')
        ->name('user.founds.my.list');
    $route->get('/founds/my/create', 'Found\My\ShowPostFoundFormHandler')
        ->name('user.founds.my.post.form');
    $route->post('/founds/my/create', 'Found\My\PostFoundHandler')
        ->name('user.founds.my.post');
    $route->post('/founds/my/{lostGoodId}/delete', 'Found\My\DeleteFoundHandler')
        ->name('user.founds.my.delete');
    $route->get('/founds/my/{lostGoodId}/update', 'Found\My\ShowUpdateFoundFormHandler')
        ->name('user.founds.my.update.form');
    $route->post('/founds/my/{lostGoodId}/update', 'Found\My\UpdateFoundHandler')
        ->name('user.founds.my.update');

    $route->get('/founds/{lostGoodId}/questions', 'Found\My\ShowQuestionsListHandler')
        ->name('user.founds.questions.list');
    $route->get('/founds/{lostGoodId}/questions/create', 'Found\My\ShowCreateQuestionFormHandler')
        ->name('user.founds.questions.create.form');
    $route->post('/founds/{lostGoodId}/questions/create', 'Found\My\CreateQuestionHandler')
        ->name('user.founds.questions.create');
    $route->get('/question/{questionId}/update', 'Found\My\ShowUpdateQuestionFormHandler')
        ->name('user.question.update.form');
    $route->post('/question/{questionId}/update', 'Found\My\UpdateQuestionHandler')
        ->name('user.question.update');
    $route->post('/question/{questionId}/delete', 'Found\My\DeleteQuestionHandler')
        ->name('user.question.delete');

    $route->get('/founds/others/list', 'Found\Other\ShowOthersFoundListHandler')
        ->name('user.founds.others.list');
    $route->get('/founds/others/{lostGoodId}/claim', 'Found\Other\ShowClaimFoundFormHandler')
        ->name('user.founds.others.claim.form');
    $route->post('/founds/others/{lostGoodId}/claim', 'Found\Other\ClaimFoundHandler')
        ->name('user.founds.others.claim');
});