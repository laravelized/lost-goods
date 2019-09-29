<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 26/09/19
 * Time: 19:26
 */

namespace App\Http\Controllers\User\Found;

use App\Http\Controllers\Controller;
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
            $lostGoods = $this->lostGoodService->getFoundsByUser($user);
            return view('user.found.list', [
                'lostGoods' => $lostGoods
            ]);
        } catch (\Exception $exception) {

        }
    }
}
