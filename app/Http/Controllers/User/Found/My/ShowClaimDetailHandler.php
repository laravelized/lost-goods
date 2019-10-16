<?php

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Answer;
use App\Modules\LostGoods\Models\Chat;
use App\Modules\LostGoods\Models\Claim;
use Illuminate\Http\Request;

class ShowClaimDetailHandler extends Controller
{
    public function __invoke(Request $request, $claimId)
    {
        try {
            $claim = Claim
                ::with([
                    'lostGood',
                    'user'
                ])
                ->where('id', $claimId)
                ->first();

            $lostGood = $claim->lostGood;
            $images = $lostGood->lostGoodImages;
            $image = $images[0];
            $questions = $lostGood->questions;
            $question = $questions[0];

            $answer = Answer::where('lost_good_claim_id', $claim->id)
                ->where('lost_good_question_id', $question->id)
                ->first();

            $chats = Chat::where('claim_id', $claim->id)->get();

            return view('user.claim.detail', [
                'claim' => $claim,
                'answer' => $answer,
                'question' => $question,
                'user' => $claim->user,
                'lostGood' => $lostGood,
                'image' => $image,
                'chats' => $chats
            ]);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
