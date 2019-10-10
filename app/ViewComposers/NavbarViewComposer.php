<?php

namespace App\ViewComposers;

use App\Modules\Notification\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NavbarViewComposer
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function compose(View $view)
    {
        $user = $this->request->user();
        $unreadNotificationsCount = Notification
            ::where('user_id', $user->id)
            ->where('was_seen_by_user', false)
            ->count();
        $view->with('unreadNotificationsCount', $unreadNotificationsCount);
    }
}