<?php


namespace App\Http\Controllers\Admin\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Modules\Permissions\Roles;
use App\Modules\User\Models\User;
use Illuminate\Http\Request;

class ShowUsersListHandler extends Controller
{
    public function __invoke(Request $request)
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', Roles::USER);
        })->get();

        return view('admin.dashboard.user.list', [
            'users' => $users
        ]);
    }
}
