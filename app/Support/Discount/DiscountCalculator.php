<?php


namespace App\Support\Discount;


use App\Models\Coupon;

class DiscountCalculator
{
    public function discountAmount(Coupon $coupon, int $amount)
    {
        $discountAmount = 0;
        if (!is_null($coupon->percent)) {
            $discountAmount = (int)(($coupon->percent / 100) * $amount);
        } elseif (!is_null($coupon->price)) {
            $discountAmount = (int)$coupon->price;
        }

        return $discountAmount;
    }

    public function discountedPrice(Coupon $coupon, int $amount)
    {
        $discountAmount = $amount - (($coupon->percent / 100) * $amount);
        return (int)$discountAmount;

    }

}
