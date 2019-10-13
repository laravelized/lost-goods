<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 26/09/19
 * Time: 19:26
 */

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use App\Modules\LostGoods\Enum\LostGoodTypeEnum;
use App\Modules\LostGoods\Models\LostGood;
use App\Modules\LostGoods\Services\LostGoodService\LostGoodServiceInterface;
use Illuminate\Http\Request;

class ShowUserFoundsListHandler extends Controller
{
    private $lostGoodService;

    public function __construct(LostGoodServiceInterface $lostGoodService)
    {
        $this->lostGoodService = $lostGoodService;
    }

    public function __invoke(Request $request)
    {
        try {
            $user = $request->user();

            if ($request->query('category')) {
                $category = Category::where('name', $request->query('category'))->first();
                $query = $category->lostGoods();
            } else {
                $query = LostGood::query();
            }

            $lostGoods = $query
                ->where('type', LostGoodTypeEnum::FOUND)
                ->where('user_id', $user->id)
                ->get();

            return view('user.found.list', [
                'lostGoods' => $lostGoods,
                'showCreateFoundButton' => true
            ]);
        } catch (\Exception $exception) {

        }
    }
}
