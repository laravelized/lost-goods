<?php

namespace App\Modules\LostGoods\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'lost_good_question_answers';

    protected $guarded = [];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }

    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
}
