<?php


namespace App\Http\Controllers\User\Notification;

use App\Http\Controllers\Controller;
use App\Modules\Notification\Models\Notification;
use Illuminate\Http\Request;

class ShowNotificationsListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $notifications = Notification
            ::where('user_id', $user->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('user.notifications.list', [
            'notifications' => $notifications
        ]);
    }
}