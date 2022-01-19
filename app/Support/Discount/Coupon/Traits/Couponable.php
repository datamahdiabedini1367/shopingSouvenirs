<?php


namespace App\Support\Discount\Coupon\Traits;


use App\Models\Coupon;
use Carbon\Carbon;

trait Couponable
{
    public function coupons()
    {
        return $this->morphMany(Coupon::class, 'couponable');
    }

    public function validCoupons()
    {
        return $this->coupons()
            ->where('is_active', 1)
            ->where('expire_time', '>=', Carbon::now() );
    }

    public function validCoupon()
    {
        return $this->coupons()
            ->where('is_active', 1)
            ->whereNull('expire_time');
    }

}
