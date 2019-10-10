<?php


namespace App\Modules\LostGoods\Events;


use App\Modules\LostGoods\Models\Claim;

class ClaimWasRejected
{
    private $claim;

    public function __construct(Claim $claim)
    {
        $this->claim = $claim;
    }

    /**
     * @return Claim
     */
    public function getClaim(): Claim
    {
        return $this->claim;
    }
}