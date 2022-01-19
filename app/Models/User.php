<?php

namespace App\Models;

use App\Jobs\SendEmail;
use App\Mail\ResetPassword;
use App\Mail\VerificationEmail;
use App\Services\Auth\Traits\MagicallyAuthenticable;
use App\Support\Discount\Coupon\Traits\Couponable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable

{
    use
//        HasApiTokens,
        Couponable,
        HasFactory,
        Notifiable,
        MagicallyAuthenticable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'firstname',
        'lastname',
        'mobile',
        'ip',
        'provider',
        'provider_id',
        'avatar',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        SendEmail::dispatch($this, new VerificationEmail($this));
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        SendEmail::dispatch($this, new ResetPassword($this, $token));
    }

}
