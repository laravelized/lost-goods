<?php

namespace App\Modules\LostGoods\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $table = 'lost_good_claims';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lostGood()
    {
        return $this->belongsTo(LostGood::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
