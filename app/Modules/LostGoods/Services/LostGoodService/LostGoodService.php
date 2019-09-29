<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:40
 */

namespace App\Modules\LostGoods\Services\LostGoodService;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Repositories\LostGoodRepository\LostGoodRepositoryInterface;
use App\Modules\User\Models\User;
use Illuminate\Support\Collection;

class LostGoodService implements LostGoodServiceInterface
{
    private $lostGoodRepository;

    public function __construct(LostGoodRepositoryInterface $lostGoodRepository)
    {
        $this->lostGoodRepository = $lostGoodRepository;
    }

    public function createLost(array $params): LostGood
    {
        return $this->lostGoodRepository->createLost($params);
    }

    public function createFound(array $params): LostGood
    {
        return $this->lostGoodRepository->createFound($params);
    }

    public function getFoundsByUser(User $user): Collection
    {
        return $this->lostGoodRepository->getFoundsByUser($user);
    }

    public function getLostsByUser(User $user): Collection
    {
        return $this->lostGoodRepository->getLostsByUser($user);
    }
}
