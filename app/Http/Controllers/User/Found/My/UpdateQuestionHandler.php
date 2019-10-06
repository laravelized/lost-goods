<?php


namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Question;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class UpdateQuestionHandler extends Controller
{
    public function __invoke(Request $request, $questionId)
    {
        $request->validate([
            'question' => [
                'required',
                'max:1000'
            ]
        ]);

        try {
            $question  = Question::where('id', $questionId)->first();
            $question->update([
                'question_text' => $request->input('question')
            ]);
            return back()
                ->with(NotificationKeys::SUCCESS, 'Pertanyaan telah berhasil terubah');
        } catch (\Exception $exception) {
            abort(500);
        }
    }
}
