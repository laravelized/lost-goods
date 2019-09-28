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
}
