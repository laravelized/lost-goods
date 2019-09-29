<?php


namespace App\Http\Controllers\User\Found\My;


use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowCreateQuestionFormHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $lostGood = LostGood::where('id', $lostGoodId)->first();
        return view('user.question.create', [
            'lostGood' => $lostGood
        ]);
    }
}