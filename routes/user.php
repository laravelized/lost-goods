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

    $route->group(['middleware' => ['auth']], function ($route) {
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
        $route->get('/founds/my/{lostGoodId}/claims', 'Found\My\ShowClaimsListHandler')
            ->name('user.founds.my.claims.list');
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
        $route->get('/founds/others/{lostGoodId}/claim', 'Found\Other\ShowClaimFoundFormHandler')
            ->name('user.founds.others.claim.form');
        $route->post('/founds/others/{lostGoodId}/claim', 'Found\Other\ClaimFoundHandler')
            ->name('user.founds.others.claim');
        $route->get('/claim/{claimId}/detail', 'Found\My\ShowClaimDetailHandler')
            ->name('user.claims.detail');
        $route->post('/claim/{claimId}/accept', 'Found\My\AcceptClaimHandler')
            ->name('user.claims.detail.accept');
        $route->post('/claim/{claimId}/deny', 'Found\My\DenyClaimHandler')
            ->name('user.claims.detail.deny');

        $route->get('/lost/my/list', 'Lost\My\ShowLostsListHandler')
            ->name('user.lost.my.list');
        $route->get('/lost/my/create', 'Lost\My\ShowPostLostFormHandler')
            ->name('user.lost.my.post.form');
        $route->post('/lost/my/create', 'Lost\My\PostLostHandler')
            ->name('user.lost.my.post');
        $route->get('/lost/my/{lostGoodId}/update', 'Lost\My\ShowUpdateLostFormHandler')
            ->name('user.lost.my.update.form');
        $route->post('/lost/my/{lostGoodId}/update', 'Lost\My\UpdateLostHandler')
            ->name('user.lost.my.update');
        $route->post('/lost/my/{lostGoodId}/delete', 'Lost\My\DeleteLostHandler')
            ->name('user.lost.my.delete');

        $route->get('/notifications', 'Notification\ShowNotificationsListHandler')
            ->name('user.notifications.list');
        $route->post('/notifications/mark-group-notifications', 'Notification\MarkGroupNotificationsHandler')
            ->name('user.notifications.mark-group-notifications');
        $route->post('/notifications/{notificationId}/mark-as-visited', 'Notification\MarkNotificationAsVisitedHandler')
            ->name('user.notifications.mark-as-visited')
            ->where('notificationId', '[0-9]+');
    });

    $route->get('/founds/others/list', 'Found\Other\ShowOthersFoundListHandler')
        ->name('user.founds.others.list');
    $route->get('/lost/others/list', 'Lost\Other\ShowOthersLostListHandler')
        ->name('user.lost.others.list');
});