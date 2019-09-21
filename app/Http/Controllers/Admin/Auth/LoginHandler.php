<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 19/09/19
 * Time: 11:33
 */

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Modules\Permissions\Permissions;
use App\Modules\User\Services\UserService\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class LoginHandler extends Controller
{
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function __invoke(LoginRequest $request)
    {
        try {
            $username = $request->input('username');

            $user = $this->userService->getByUsername($username);

            if (is_null($user)) {
                return back()
                    ->withErrors(['username' => 'your username is not valid']);
            }

            $password = $request->input('password');
            $isPasswordRight = Hash::check($password, $user->password);

            if (!$isPasswordRight) {
                return back()
                    ->withErrors(['password' => 'your password is not valid']);
            }

            Auth::login($user);

            if (!Gate::allows(Permissions::ACCESS_ADMIN_DASHBOARD)) {

                Auth::logout();

                return redirect()
                    ->back()
                    ->with('failed', 'You are not allowed to access this page');
            }

            return redirect()
                ->route('admin.dashboard.index');

        } catch (\Exception $exception) {

            return back()
                ->with('failed', $exception->getMessage());
        }
    }
}
