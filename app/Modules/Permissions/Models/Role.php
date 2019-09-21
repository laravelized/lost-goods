<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 18/09/19
 * Time: 11:30
 */

namespace App\Modules\Permissions\Models;

use App\Modules\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
