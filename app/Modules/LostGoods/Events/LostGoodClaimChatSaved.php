<?php


namespace App\Modules\LostGoods\Events;


use App\Modules\LostGoods\Models\Chat;

class LostGoodClaimChatSaved
{
    private $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    /**
     * @return Chat
     */
    public function getChat(): Chat
    {
        return $this->chat;
    }
}