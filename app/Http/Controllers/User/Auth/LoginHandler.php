<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 24/09/19
 * Time: 20:15
 */

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Modules\User\Exceptions\PasswordDoesNotMatchException;
use App\Modules\User\Exceptions\UserDoesNotExistException;
use App\Modules\User\Services\UserService\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            $user = $this->userService->getByUsername($request->input('username'));
            if (is_null($user)) {
                throw new UserDoesNotExistException(UserDoesNotExistException::MESSAGE_KEY);
            }

            if (!Hash::check($request->input('password'), $user->password)) {
                throw new PasswordDoesNotMatchException(PasswordDoesNotMatchException::MESSAGE_KEY);
            }

            Auth::login($user);

            return redirect()
                ->route('user.index')
                ->with('success', 'You has logged in successfully');

        } catch (\Exception $exception) {

            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
