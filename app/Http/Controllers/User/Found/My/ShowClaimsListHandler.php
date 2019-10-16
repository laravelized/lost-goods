<?php

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Claim;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class ShowClaimsListHandler extends Controller
{
    public function __invoke(Request $request, $lostGoodId)
    {
        $lostGood = LostGood::where('id', $lostGoodId)->first();
        $claims = Claim::where('lost_good_id', $lostGood->id)->get();
        return view('user.claim.list', [
            'claims' => $claims
        ]);
    }
}
