<?php


namespace App\Modules\LostGoods\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'lost_good_questions';

    protected $guarded = [];

    public function lostGood()
    {
        return $this->belongsTo(LostGood::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
