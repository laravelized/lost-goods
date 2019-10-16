<?php

namespace App\Modules\LostGoods\Listeners;

use App\Modules\LostGoods\Events\LostGoodClaimChatSaved;
use Pusher\Pusher;

class BroadcastChat
{
    private $pusher;

    public function __construct(Pusher $pusher)
    {
        $this->pusher = $pusher;
    }

    public function handle(LostGoodClaimChatSaved $event)
    {
        $chat = $event->getChat();
        $channelName = "claim@{$chat->claim_id}";
        $this->pusher->trigger($channelName, 'message-incoming', [
            'message' => $chat->content,
            'user_id' => $chat->user_id
        ]);
    }
}