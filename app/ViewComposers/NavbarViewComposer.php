<?php

namespace App\ViewComposers;

use App\Modules\Notification\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $user = $this->request->user();
            $unreadNotificationsCount = Notification
                ::where('user_id', $user->id)
                ->where('was_seen_by_user', false)
                ->count();
            $view->with('unreadNotificationsCount', $unreadNotificationsCount);
        } else {
            $view->with('unreadNotificationsCount', 0);
        }
    }
}