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

    public function getIsVerifyEmailAttribute()
    {
        return !is_null($this->email_verified_at) ? 'تایید شده':'تایید  نشده';
    }

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

    public function address_default()
    {
        return $this->addresses()->where('default' ,1)->first();
    }

    public function sendPasswordResetNotification($token)
    {
        SendEmail::dispatch($this, new ResetPassword($this, $token));
    }

    public function orders()
    {
        return $this->hasMany(Order::class,'user_id' ,'id');
    }


    public function latestOrder()
    {
        return $this->hasOne(Order::class)->latestOfMany();
    }

    public function getNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getHasAddressDefaultAttribute()
    {
        return $this->addresses()->where('default' ,1)->exists();
    }

}
