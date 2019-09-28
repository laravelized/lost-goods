<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:39
 */

namespace App\Modules\LostGoods\Repositories\LostGoodRepository;

use App\Modules\LostGoods\Models\LostGood;

class LostGoodRepository implements LostGoodRepositoryInterface
{
    private $model;

    public function __construct(LostGood $lostGood)
    {
        $this->model = $lostGood;
    }

    public function createLost(array $params): LostGood
    {
        return $this->model->create([
            'name' => $params['name'],
            'user_id' => $params['user_id'],
            'information' => $params['information'],
            'type' => $params['type'],
            'place_details' => $params['place_details'],
            'date' => $params['date']
        ]);
    }

    public function createFound(array $params): LostGood
    {
        return $this->model->create([
            'name' => $params['name'],
            'user_id' => $params['user_id'],
            'information' => $params['information'],
            'type' => $params['type'],
            'place_details' => $params['place_details'],
            'date' => $params['date']
        ]);
    }
}
