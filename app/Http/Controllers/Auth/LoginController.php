<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Rules\Recaptcha;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//    use AuthenticatesUsers;
    use ThrottlesLogins;



    protected $maxAttempts = 2; // count attempts for try in login



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validateForm($request);

        if ($this->hasTooManyLoginAttempts($request)) {

            return $this->sendLockoutResponse($request);
        }


        if ($this->attempLogin($request)) {
            return $this->sendSuccessResponse();
        }

        $this->incrementLoginAttempts($request);

        return $this->sendLoginFailedResponse();

    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required',],
            'g-recaptcha-response' => ['required',new Recaptcha],
        ],[
            'g-recaptcha-response.required'=>__('auth.recaptcha'),
        ]);
    }

    protected function attempLogin(Request $request)
    {
        return Auth::attempt($request->only(['email', 'password']), $request->filled('remember'));
    }

    protected function sendSuccessResponse()
    {
        session()->regenerate();
        return redirect()->intended();

    }

    protected function sendLoginFailedResponse()
    {
        return back()->with('wrongCredentials',true);
    }

    public function logout()
    {
        session()->invalidate();
        Auth::logout();
        return redirect()->route('home');
    }


    protected function username()
    {
        return 'email';
    }

}
