<?php


namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class DeleteFoundHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        try {
            $lostGood = LostGood::where('id', $lostGoodId)->first();
            $lostGood->delete();

            return back();

        } catch (\Exception $exception) {

            throw $exception;
        }
    }
}
