<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;

use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    public function redirectPath()
    {
        if (Auth::user()->user_role == 'admin'){
            return '/admin';
        }elseif (Auth::user()->user_role == 'user'){
            return '/user';
        }else{
            return '/';
            // return " verifed your email";
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $request->session()->put('login_error', trans('auth.failed'));
    //     throw ValidationException::withMessages(
    //         [
    //             'error' => [trans('auth.failed')],
    //         ]
    //     );
    // }
}
