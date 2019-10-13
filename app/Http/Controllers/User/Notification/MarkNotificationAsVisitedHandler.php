<?php


namespace App\Http\Controllers\User\Notification;


use App\Http\Controllers\Controller;
use App\Modules\Notification\Events\NotificationIsBeingViewed;
use App\Modules\Notification\Models\Notification;
use Illuminate\Http\Request;

class MarkNotificationAsVisitedHandler extends Controller
{
    public function __invoke(Request $request, $notificationId)
    {
        $notification = Notification::where('id', $notificationId)->first();
        if (!is_null($notification)) {
            event(new NotificationIsBeingViewed($notification));
        }

        return response()
            ->json([
                'message' => 'ok'
            ], 200);
    }
}