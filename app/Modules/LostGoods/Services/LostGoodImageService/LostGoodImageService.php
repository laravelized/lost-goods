<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:15
 */

namespace App\Modules\LostGoods\Services\LostGoodImageService;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use App\Modules\LostGoods\Repositories\LostGoodImageRepository\LostGoodImageRepositoryInterface;
use Illuminate\Support\Collection;

class LostGoodImageService implements LostGoodImageServiceInterface
{
    private $lostGoodImageRepository;

    public function __construct(
        LostGoodImageRepositoryInterface $lostGoodImageRepository
    )
    {
        $this->lostGoodImageRepository = $lostGoodImageRepository;
    }

    public function create(array $params): LostGoodImage
    {
        return $this->lostGoodImageRepository->create($params);
    }

    public function getByLostGood(LostGood $lostGood): ?Collection
    {
        return $this->lostGoodImageRepository->getByLostGood($lostGood);
    }

    public function getByFileName(string $fileName): ?LostGoodImage
    {
        return $this->lostGoodImageRepository->getByFileName($fileName);
    }
}
