<?php

namespace App\Http\Controllers\User\Found\Other;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Answer;
use App\Modules\LostGoods\Models\Claim;
use App\Modules\LostGoods\Models\LostGood;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class ClaimFoundHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $request->validate([
            'answer' =>[
                'required',
                'max:100'
            ]
        ]);


        $user = $request->user();
        $lostGood = LostGood::where('id', $lostGoodId)->first();
        $question = $lostGood->questions[0];

        $claim = Claim
            ::where('lost_good_id', $lostGood->id)
            ->where('user_id', $user->id)
            ->first();

        if (is_null($claim)) {
            $claim = Claim::create([
                'lost_good_id' => $lostGood->id,
                'user_id' => $user->id,
            ]);
        }

        $answers = Answer::where('lost_good_claim_id', $claim->id)->get();
        if ($answers->count()) {
            $answers[0]->update([
                'answer_text' => $request->input('answer')
            ]);
        } else {
            Answer::create([
                'lost_good_claim_id' => $claim->id,
                'lost_good_question_id' => $question->id,
                'answer_text' => $request->input('answer')
            ]);
        }

        return redirect()
            ->route('user.founds.others.list')
            ->with(NotificationKeys::SUCCESS, __('messages.notifications.your_claim_saved'));
    }
}
