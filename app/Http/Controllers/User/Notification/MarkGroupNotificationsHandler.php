<?php


namespace App\Http\Controllers\User\Notification;

use App\Http\Controllers\Controller;
use App\Modules\Notification\Events\NotificationListPageIsBeingViewed;
use Illuminate\Http\Request;

class MarkGroupNotificationsHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        event(new NotificationListPageIsBeingViewed($user));

        return response()
            ->json([
                'message' => 'ok'
            ]);
    }
}
