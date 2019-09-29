<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:39
 */

namespace App\Modules\LostGoods\Repositories\LostGoodRepository;

use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

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
            'date' => $params['date'],
            'mobile_number' => $params['mobile_number']
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
            'date' => $params['date'],
            'mobile_number' => $params['mobile_number']
        ]);
    }

    public function getFoundsByUser(User $user): Collection
    {
        return $this->model
            ->with(['lostGoodImages'])
            ->where('user_id', $user->id)
            ->where('type', LostGoodTypeEnum::FOUND)
            ->get();
    }

    public function getLostsByUser(User $user): Collection
    {
        return $this->model
            ->with(['lostGoodImages'])
            ->where('user_id', $user->id)
            ->where('type', LostGoodTypeEnum::LOST)
            ->get();
    }
}
