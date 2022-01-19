<?php

namespace App\Services\Auth;


use App\Models\LoginToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MagicAuthentication
{
    const  INVALIDE_TOKEN = 'token.invalid';
    const  AUTHENTICATED = 'authenticated';
    protected $request;



    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function requestLink()
    {
        $user= $this->getUser();


         $user->createToken()->send([
            'remember'=>$this->request->has('remember'),
        ]);

    }

    private function getUser()
    {
        return User::query()->where('email',$this->request->email)->firstOrFail();
    }

    public function authenticate(LoginToken $token)
    {

        if ($token->isExpired()){
            return self::INVALIDE_TOKEN;
        }

        Auth::login($token->user,$this->request->query('remember'));

        $token->delete();
        return self::AUTHENTICATED;


    }

}
