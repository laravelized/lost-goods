<?php

namespace App\Http\Controllers\User\Claim;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Models\Claim;
use Illuminate\Http\Request;

class ShowClaimDetailHandler extends Controller
{
    public function __invoke(Request $request, $claimId)
    {
        $claim = Claim::where('id', $claimId)->firstOrFail();
        return view('', [
            'claim' => $claim
        ]);
    }
}
