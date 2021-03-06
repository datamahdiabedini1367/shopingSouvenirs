<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

//    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'send');
    }

    /***
     * send link verification to email user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send()
    {

        if (Auth::user()->hasVerifiedEmail()){
            return redirect()->route('home');
        }
        Auth::user()->sendEmailVerificationNotification();
        /** get user **/
        /** create signed route **/
        /** send url **/
        /** redirect **/

        return redirect()->back()->with('verificationEmailSent',true);
    }

    /***
     * verify email user
     */
    public function verify(Request $request)
    {

        if ($request->user()->email !== $request->query('email')){
            throw new AuthorizationException;
        }

        if ($request->user()->hasVerifiedEmail()){ /** check status email **/
            return redirect()->route('home'); /** redirect user to page home **/
        }

        $request->user()->markEmailAsVerified(); /** verify email user **/


        session()->forget('mustVerifyEmail'); /** delete message must verify Email**/

        return redirect()->route('home')->with('emailHasVerified',true); /** redirect user to home and send message verified **/
    }
}
