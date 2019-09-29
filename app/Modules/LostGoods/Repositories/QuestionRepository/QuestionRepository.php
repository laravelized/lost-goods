<?php


namespace App\Modules\LostGoods\Repositories\QuestionRepository;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\Question;
use Illuminate\Support\Collection;

class QuestionRepository implements QuestionRepositoryInterface
{
    private $model;

    public function __construct(Question $question)
    {
        $this->model = $question;
    }

    public function create(array $params): Question
    {
        return $this->model->create([
            'lost_good_id' => $params['lost_good_id'],
            'question_text' => $params['question_text']
        ]);
    }

    public function getByLostGood(LostGood $lostGood): Collection
    {
        return $this->model->where('lost_good_id', $lostGood->id)->get();
    }
}
