<?php


namespace App\Http\Controllers\User\Claim;


use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Events\LostGoodClaimChatSaved;
use App\Modules\LostGoods\Models\Chat;
use Illuminate\Http\Request;

class SendLostGoodClaimChat extends Controller
{
    public function __invoke(Request $request, $claimId)
    {
        $user = $request->user();
        $chat = Chat::create([
            'user_id' => $user->id,
            'claim_id' => $claimId,
            'content' => $request->input('message')
        ]);

        event(new LostGoodClaimChatSaved($chat));

        return response()
            ->json([
                'message' => 'ok'
            ]);
    }
}