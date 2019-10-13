<?php

namespace App\Modules\Notification;

use App\Modules\Notification\Events\NotificationIsBeingViewed;
use App\Modules\Notification\Events\NotificationListPageIsBeingViewed;
use App\Modules\Notification\Listeners\MarkNotificationAsVisited;
use App\Modules\Notification\Listeners\MarkNotificationsAsVisitedGrouply;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class NotificationServiceProvider extends EventServiceProvider
{
    protected $listen = [
        NotificationListPageIsBeingViewed::class => [
            MarkNotificationsAsVisitedGrouply::class
        ],
        NotificationIsBeingViewed::class => [
            MarkNotificationAsVisited::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }
}