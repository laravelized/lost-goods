<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 24/09/19
 * Time: 18:13
 */

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutHandler extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        return redirect()
            ->route('admin.login.form');
    }
}
