<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 11:30
 */

namespace App\Modules\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
