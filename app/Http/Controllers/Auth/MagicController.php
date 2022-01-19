<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use App\Services\Auth\MagicAuthentication;
use Illuminate\Http\Request;

class MagicController extends Controller
{
    protected $auth;

    public function __construct(MagicAuthentication $auth)
    {
        $this->middleware('guest');
        $this->auth = $auth;
    }

    public function showMagicForm()
    {
        return view('auth.magic-login');
    }

    /**
     * send token to email for login
    */
    public function sendToken(Request $request)
    {

        $this->validateForm($request);
        /**validate form**/

        $this->auth->requestLink();
        /**generate token and send token**/


        return back()->with('magicLinkSent', true);
        /**redirect and send alert**/

    }

    protected function validateForm($request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users'],

        ]);

    }

    public function login(LoginToken $token)
    {

        return $this->auth->authenticate($token) === $this->auth::AUTHENTICATED
            ? redirect()->route('home')
            : redirect()->route('auth.magic.login.form')->with('invalidToken', true);

    }
}
