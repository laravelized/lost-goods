<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 12:07
 */

namespace App\Modules\Category\Models;

use App\Modules\LostGoods\Models\LostGood;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public function lostGoods()
    {
        return $this->belongsToMany(LostGood::class);
    }
}
