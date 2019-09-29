<?php


namespace App\Http\Controllers\User\Found;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\Question;
use Illuminate\Http\Request;

class CreateQuestionHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $lostGood = LostGood::where('id', $lostGoodId)->first();
        $question = Question::create([
            'lost_good_id' => $lostGood->id,
            'question_text' => $request->input('question')
        ]);

        return redirect()
            ->route('user.founds.questions.list', ['lostGoodId' => $lostGood->id]);
    }
}