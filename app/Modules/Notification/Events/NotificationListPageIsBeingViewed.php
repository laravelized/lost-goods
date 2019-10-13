<?php

namespace App\Modules\Notification\Events;

use App\Modules\User\Models\User;

class NotificationListPageIsBeingViewed
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}