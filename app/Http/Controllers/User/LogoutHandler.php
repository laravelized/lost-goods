<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 20:17
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutHandler extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        return redirect()
            ->route('user.index')
            ->with('success', 'You has been logged out successfully');
    }
}
