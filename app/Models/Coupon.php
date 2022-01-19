<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',            // کد تخفیف
        'percent',         // درصد تخفیف
        'limit',           // سقف خرید برای خرید های بالای این مبلغ تخفیف اعمال می شود
        'price',           // این مبلغ در صورتی که مبلغ خرید بالای سقف خرید باشد اعمال می شود
        'expire_time',     // مدت زمان استفاده از این تخفیف
        'couponable_id',   // این کد تخفیف به باید به یکی از این ای دی ها  اعمال شود.1-کاربر 2-محصولات
        'couponable_type', // این کد تخفیف باید به نام یکی از این کلاس باید اعمال شود.1-کاربر 2-محصولات
        'is_active',       // فعال بودن یا نبودن کد تخفیف
    ];

    public function isExpired()
    {
            $expireTime = Carbon::parse($this->expire_time);
            return Carbon::now()->isAfter($expireTime);
    }

    public function isNotPercentOrPrice()
    {

        if (is_null($this->percent) && is_null($this->price)){
            return true;
        }
        return false;
    }

    public function disable()
    {
        $this->is_active =0 ;
        $this->save();

    }
}
