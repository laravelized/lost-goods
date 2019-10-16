<?php
/**
 * Created by PhpStorm.
 * User: rickyandhi
 * Date: 24/09/19
 * Time: 20:15
 */

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Modules\User\Actions\RegisterUserAction;
use App\Services\Session\NotificationKeys;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterHandler extends Controller
{
    private $registerUserAction;

    public function __construct(
        RegisterUserAction $registerUserAction
    )
    {
        $this->registerUserAction = $registerUserAction;
    }

    public function __invoke(RegisterRequest $request)
    {
        $request->validate([
            'username' => [
                'required',
                'max:191',
                'unique:users,username'
            ],
            'password' => [
                'required',
                'confirmed'
            ],
            'full_name' => [
                'required',
                'max:191',
            ],
            'address' => [
                'required',
                'max:191'
            ],
            'gender' => [
                'required',
                Rule::in([0,1])
            ],
            'mobile_number' => [
                'required',
                'unique:users,mobile_number'
            ]
        ]);

        try {
            $this->registerUserAction->act([
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'gender' => $request->input('gender'),
                'mobile_number' => $request->input('mobile_number')
            ]);

            return redirect()
                ->route('user.login.form')
                ->with(NotificationKeys::SUCCESS, __('messages.notifications.registered_successfully'));

        } catch (\Exception $exception) {

            return back()
                ->with(NotificationKeys::EXCEPTION, $exception->getMessage());
        }
    }
}
