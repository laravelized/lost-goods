<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:32
 */

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowLoginFormHandler extends Controller
{
    public function __invoke(Request $request)
    {
        return view('admin.auth.login');
    }
}
