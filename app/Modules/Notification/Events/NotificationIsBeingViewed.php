<?php

namespace App\Modules\Notification\Events;

use App\Modules\Notification\Models\Notification;

class NotificationIsBeingViewed
{
    private $notification;

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return Notification
     */
    public function getNotification(): Notification
    {
        return $this->notification;
    }
}
