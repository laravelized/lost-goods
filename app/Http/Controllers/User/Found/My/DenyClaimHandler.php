<?php

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum;
use App\Modules\LostGoods\Events\ClaimWasRejected;
use App\Modules\LostGoods\Models\Claim;
use Illuminate\Http\Request;

class DenyClaimHandler extends Controller
{
    public function __invoke(Request $request, $claimId)
    {
        try {

            $claim = Claim::where('id', $claimId)->first();
            $claim->update([
                'status' => LostGoodClaimStatusEnum::DENIED
            ]);

            event(new ClaimWasRejected($claim));

            return redirect()
                ->route('user.founds.my.claims.list', ['lostGoodId' => $claim->lost_good_id]);

        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
