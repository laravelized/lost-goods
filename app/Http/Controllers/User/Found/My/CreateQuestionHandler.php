<?php


namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\Question;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class CreateQuestionHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $request->validate([
            'question' => [
                'required',
                'max:1000'
            ]
        ]);

        try {
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            Question::create([
                'lost_good_id' => $lostGood->id,
                'question_text' => $request->input('question')
            ]);

            return redirect()
                ->route('user.founds.my.list')
                ->with(NotificationKeys::SUCCESS, 'Pertanyaan telah berhasil tersimpan');

        } catch (\Exception $exception) {
            abort(500);
        }
    }
}