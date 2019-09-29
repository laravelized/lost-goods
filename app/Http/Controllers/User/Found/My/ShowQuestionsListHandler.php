<?php


namespace App\Http\Controllers\User\Found\My;


use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowQuestionsListHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        try {
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            $questions = $lostGood->questions;
            return view('user.question.list', [
                'questions' => $questions,
                'lostGood' => $lostGood
            ]);
        } catch (\Exception $exception) {

        }
    }
}