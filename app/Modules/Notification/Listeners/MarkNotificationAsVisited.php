<?php

namespace App\Modules\Notification\Listeners;

use App\Modules\Notification\Enums\NotificationStatuses;
use App\Modules\Notification\Events\NotificationIsBeingViewed;

class MarkNotificationAsVisited
{
    public function handle(NotificationIsBeingViewed $event)
    {
        $notification = $event->getNotification();
        $notification->update([
            'status' => NotificationStatuses::VIEWED_INDIVIDUALLY
        ]);
    }
}