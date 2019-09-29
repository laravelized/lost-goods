<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 7:44
 */

namespace App\Modules\LostGoods;

use App\Modules\LostGoods\Repositories\LostGoodImageRepository\LostGoodImageRepository;
use App\Modules\LostGoods\Repositories\LostGoodImageRepository\LostGoodImageRepositoryInterface;
use App\Modules\LostGoods\Repositories\LostGoodRepository\LostGoodRepository;
use App\Modules\LostGoods\Repositories\LostGoodRepository\LostGoodRepositoryInterface;
use App\Modules\LostGoods\Repositories\QuestionRepository\QuestionRepository;
use App\Modules\LostGoods\Repositories\QuestionRepository\QuestionRepositoryInterface;
use App\Modules\LostGoods\Services\LostGoodImageService\LostGoodImageService;
use App\Modules\LostGoods\Services\LostGoodImageService\LostGoodImageServiceInterface;
use App\Modules\LostGoods\Services\LostGoodService\LostGoodService;
use App\Modules\LostGoods\Services\LostGoodService\LostGoodServiceInterface;
use Illuminate\Support\ServiceProvider;

class LostGoodServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            LostGoodRepositoryInterface::class,
            LostGoodRepository::class
        );

        $this->app->bind(
            LostGoodServiceInterface::class,
            LostGoodService::class
        );

        $this->app->bind(
            LostGoodImageRepositoryInterface::class,
            LostGoodImageRepository::class
        );

        $this->app->bind(
            LostGoodImageServiceInterface::class,
            LostGoodImageService::class
        );

        $this->app->bind(
            QuestionRepositoryInterface::class,
            QuestionRepository::class
        );
    }
}
