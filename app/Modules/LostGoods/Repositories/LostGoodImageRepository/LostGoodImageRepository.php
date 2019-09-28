<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:14
 */

namespace App\Modules\LostGoods\Repositories\LostGoodImageRepository;

use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Models\LostGoodImage;
use Illuminate\Support\Collection;

class LostGoodImageRepository implements LostGoodImageRepositoryInterface
{
    private $model;

    public function __construct(LostGoodImage $lostGoodImage)
    {
        $this->model = $lostGoodImage;
    }

    public function create(array $params): LostGoodImage
    {
        return $this->model->create([
            'lost_good_id' => $params['lost_good_id'],
            'url' => $params['url'],
            'path' => $params['path'],
            'uploader_class' => $params['uploader_class'],
            'file_name' => $params['file_name']
        ]);
    }

    public function getByLostGood(LostGood $lostGood): Collection
    {
        return $lostGood->lostGoodImages;
    }

    public function getByFileName(string $fileName): ?LostGoodImage
    {
        return $this->model->where('file_name', $fileName)->first();
    }
}
