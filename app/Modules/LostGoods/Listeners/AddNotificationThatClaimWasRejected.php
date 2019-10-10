<?php

namespace App\Modules\LostGoods\Listeners;

use App\Modules\LostGoods\Events\ClaimWasRejected;
use App\Modules\Notification\Models\Notification;

class AddNotificationThatClaimWasRejected
{
    public function handle(ClaimWasRejected $event)
    {
        $claim = $event->getClaim();
        Notification::create([
            'message' => __('notifications.claim_rejected', [
                'username' => 'cor'
            ]),
            'url' => route()
        ]);
    }
}
