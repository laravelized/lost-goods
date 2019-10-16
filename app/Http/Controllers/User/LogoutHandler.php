<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 25/09/19
 * Time: 20:17
 */

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutHandler extends Controller
{
    public function __invoke(Request $request)
    {
        Auth::logout();

        return redirect()
            ->route('user.index')
            ->with(NotificationKeys::SUCCESS, __('messages.notifications.you_have_been_logged_out'));
    }
}
