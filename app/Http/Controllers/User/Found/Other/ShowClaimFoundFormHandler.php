<?php

namespace App\Http\Controllers\User\Found\Other;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Answer;
use App\Modules\LostGoods\Models\Chat;
use App\Modules\LostGoods\Models\Claim;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowClaimFoundFormHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        try {
            $user = $request->user();
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            $questions = $lostGood->questions;

            $claim = Claim
                ::where('lost_good_id', $lostGood->id)
                ->where('user_id', $user->id)
                ->first();

            if (is_null($claim)) {
                $answer = null;
            } else {
                $answer = Answer
                    ::where('lost_good_claim_id', $claim->id)
                    ->first();
            }

            $chats = collect([]);
            if (!is_null($claim)) {
                $chats = Chat::where('claim_id', $claim->id)->get();
            }

            return view('user.claim.index', [
                'claim' => $claim,
                'questions' => $questions,
                'lostGood' => $lostGood,
                'answer' => $answer,
                'chats' => $chats
            ]);

        } catch (\Exception $exception) {
            abort(500);
        }
    }
}
