<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 21/09/19
 * Time: 10:07
 */

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class AdminAuthenticate extends Authenticate
{
    public function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
}
