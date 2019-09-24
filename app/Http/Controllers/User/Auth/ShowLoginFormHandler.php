<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 24/09/19
 * Time: 20:14
 */

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowLoginFormHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return view('user.auth.login');
    }
}
