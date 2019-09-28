<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 28/09/19
 * Time: 11:09
 */

namespace App\Modules\LostGoods\Models;

use Illuminate\Database\Eloquent\Model;

class LostGoodImage extends Model
{
    protected $table = 'lost_good_images';

    protected $guarded = [];

    public function lostGood()
    {
        return $this->belongsTo(LostGood::class);
    }
}
