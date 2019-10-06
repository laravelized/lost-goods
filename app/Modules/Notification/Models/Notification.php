<?php

namespace App\Modules\Notification\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
