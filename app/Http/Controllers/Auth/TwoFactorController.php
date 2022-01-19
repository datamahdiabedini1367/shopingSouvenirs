<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRequest;
use App\Services\Auth\TTwoFactorAuthentication;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    protected $twoFactor;

    public function __construct(TTwoFactorAuthentication $twoFactorAuthentication)
    {
        $this->twoFactor = $twoFactorAuthentication;
        $this->middleware('auth')->except('resent');
    }

    public function showToggleForm()
    {
        return view('auth.two-factor.toggle');
    }

    public function activate()
    {
        $response = $this->twoFactor->requestCode(Auth::user());


        return $response === $this->twoFactor::CODE_SENT
            ? redirect()->route('auth.two.factor.code.form')
            : back()->with('cantSendCode', true);
    }

    public function showEnterCodeForm()
    {
        return view('auth.two-factor.enter-code');
    }

    public function confirmCode(CodeRequest $request)
        /** validate data form for Code **/
    {

        $response = $this->twoFactor->activate();


        return $response === $this->twoFactor::ACTIVATED
            ? redirect()->route('auth.two.factor.toggle.form')->with('twoFactorActivated', true)
            : back()->with('invalidCode', 'true');

    }

    public function deactivate()
    {
        $this->twoFactor->deactivate(Auth::user());

        return back()->with('twoFactorDeactivated', true);
    }

    public function resent()
    {
        $this->twoFactor->resent();

        return back()->with('codeResent', true);
    }

}
