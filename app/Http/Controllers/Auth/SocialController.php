<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

//use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callbackProvider($driver)
    {
        $user= Socialite::driver($driver)->user();

        Auth::login($this->findOrCreateUser($user,$driver));

        return redirect()->intended();
    }

    private function findOrCreateUser($user,$driver)
    {
        $providerUser = User::query()->where('email',$user->getEmail() )->first();

        if (!is_null($providerUser)) return $providerUser;

        return User::query()->create([
            'email'=>$user->getEmail(),
            'firstname'=>$user->user['given_name'],
            'lastname'=>$user->user['family_name'],
            'provider'=>$driver,
            'provider_id'=>$user->getId(),
            'avatar'=>$user->getAvatar(),
            'email_verified_at'=>now(),

        ]);


    }

}
