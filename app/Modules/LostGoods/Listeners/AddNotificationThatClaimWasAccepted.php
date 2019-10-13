<?php

namespace App\Modules\LostGoods\Listeners;

use App\Modules\LostGoods\Events\ClaimWasAccepted;
use App\Modules\Notification\Enums\NotificationStatuses;
use App\Modules\Notification\Models\Notification;

class AddNotificationThatClaimWasAccepted
{
    public function handle(ClaimWasAccepted $event)
    {
        $claim = $event->getClaim();
        $lostGood = $claim->lostGood;

        Notification::create([
            'user_id' => $claim->user_id,
            'status' => NotificationStatuses::CREATED,
            'message' => __('notifications.claim_accepted', [
                'username' => $lostGood->user->username
            ]),
            'url' => route('user.founds.others.claim.form', ['lostGoodId' => $lostGood->id])
        ]);
    }
}
