<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 12:07
 */

namespace App\Modules\LostGoods\Models;

use App\Modules\Category\Models\Category;
use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class LostGood extends Model
{
    protected $table = 'lost_goods';

    protected $guarded = [];

    protected $casts = [
        'date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lostGoodImages()
    {
        return $this->hasMany(LostGoodImage::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
