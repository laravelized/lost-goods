<?php


namespace App\Modules\LostGoods\Models;


use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'lost_good_claim_chats';

    protected $guarded = [];

    public function claim()
    {
        return $this->belongsTo(Claim::class, 'claim_id', 'id');
    }
}