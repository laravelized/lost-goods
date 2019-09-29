<?php


namespace App\Http\Controllers\User\Found\My;


use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Question;
use Illuminate\Http\Request;

class DeleteQuestionHandler extends Controller
{
    public function __invoke(Request $request, $questionId)
    {
        $question = Question::where('id', $questionId)->first();
        $question->delete();

        return back();
    }
}