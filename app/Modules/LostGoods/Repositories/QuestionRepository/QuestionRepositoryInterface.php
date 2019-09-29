<?php


namespace App\Modules\LostGoods\Repositories\QuestionRepository;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\Question;
use Illuminate\Support\Collection;

interface QuestionRepositoryInterface
{
    public function create(array $params): Question;

    public function getByLostGood(LostGood $lostGood): Collection;
}
