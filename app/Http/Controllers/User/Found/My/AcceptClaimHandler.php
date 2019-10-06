<?php

namespace App\Http\Controllers\User\Found\My;

use App\Http\Controllers\Controller;
use App\Modules\LostGoods\Enum\LostGoodClaimStatusEnum;
use App\Modules\LostGoods\Models\Claim;
use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Http\Request;

class AcceptClaimHandler extends Controller
{
    public function __invoke(Request $request, $claimId)
    {
        try {
            $claim = Claim::where('id', $claimId)->first();
            $claim->update([
                'status' => LostGoodClaimStatusEnum::ACCEPTED
            ]);

            $otherClaims = Claim
                ::where('lost_good_id', $claim->lost_good_id)
                ->whereNotIn('id', [$claim->id])
                ->get();

            foreach ($otherClaims as $anotherClaim) {
                $anotherClaim->update([
                    'status' => LostGoodClaimStatusEnum::DENIED
                ]);
            }

            $lostGood = LostGood::where('id', $claim->lost_good_id)->first();
            $lostGood->update([
                'is_resolved' => true
            ]);

            return redirect()
                ->route('user.founds.my.claims.list', ['lostGoodId' => $claim->lost_good_id]);

        } catch (\Exception $exception) {
            abort(500);
        }
    }
}
