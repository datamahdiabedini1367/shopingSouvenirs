<?php


namespace App\Support\Discount\Coupon;


use App\Models\Coupon;
use App\Support\Discount\Coupon\Validator\CanUseIt;
use App\Support\Discount\Coupon\Validator\IsExpired;
use App\Support\Discount\Coupon\Validator\IsPercentOrPrice;
use App\Support\Discount\Coupon\Validator\PurchaseAmountLessThanCeiling;

class CouponValidator
{
    public function isValid(Coupon $coupon)
    {
        $canUseIt = resolve(CanUseIt::class);
        $isExpired = resolve(IsExpired::class);
        $limitPurchase = resolve(PurchaseAmountLessThanCeiling::class);
        $isPercentOrPrice = resolve(IsPercentOrPrice::class);
//
//
        $canUseIt->setNextValidator($isExpired);
        $isExpired->setNextValidator($limitPurchase);
        $limitPurchase->setNextValidator($isPercentOrPrice);

        return $canUseIt->validate($coupon);

    }

}
