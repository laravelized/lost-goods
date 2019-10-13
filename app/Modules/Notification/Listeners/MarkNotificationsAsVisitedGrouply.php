<?php

namespace App\Modules\Notification\Listeners;

use App\Modules\Notification\Enums\NotificationStatuses;
use App\Modules\Notification\Events\NotificationListPageIsBeingViewed;
use App\Modules\Notification\Models\Notification;

class MarkNotificationsAsVisitedGrouply
{
    public function handle(NotificationListPageIsBeingViewed $event)
    {
        $user = $event->getUser();
        $notifications = Notification::where('user_id', $user->id)
            ->where('status', NotificationStatuses::CREATED)
            ->get();
        foreach ($notifications as $notification) {
            $notification->update([
                'status' => NotificationStatuses::VIEWED_GROUPLY
            ]);
        }
    }
}