<?php


namespace App\Http\Controllers\User\Found;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Question;
use Illuminate\Http\Request;

class UpdateQuestionHandler extends Controller
{
    public function __invoke(Request $request, $questionId)
    {
        try {
            $question  = Question::where('id', $questionId)->first();
            $question->update([
                'question_text' => $request->input('question')
            ]);
            return back();
        } catch (\Exception $exception) {

        }
    }
}
