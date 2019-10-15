<?php

namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Modules\User\Models\User;
use App\Services\Session\NotificationKeys;
use Illuminate\Http\Request;

class DeleteUserHandler extends Controller
{
    public function __invoke(Request $request, $userId)
    {
        $user = User::where('id', $userId)->firstOrFail();
        $user->delete();
        return redirect()
            ->back()
            ->with(NotificationKeys::SUCCESS, __('messages.notification.user_deleted'));
    }
}
