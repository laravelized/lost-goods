<?php

namespace App\Modules\LostGoods\Listeners;

use App\Modules\LostGoods\Events\ClaimWasAccepted;
use App\Modules\Notification\Models\Notification;

class AddNotificationThatClaimWasAccepted
{
    public function handle(ClaimWasAccepted $event)
    {
        $claim = $event->getClaim();
        Notification::create([
            'message' => __('notifications.'),
            'url' => route()
        ]);
    }
}
