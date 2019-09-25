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
use Illuminate\Support\Facades\Hash;

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
                ->with('success', 'You are registered successfully, you can login now');

        } catch (\Exception $exception) {

            return back()
                ->with('exception', $exception->getMessage());
        }
    }
}
