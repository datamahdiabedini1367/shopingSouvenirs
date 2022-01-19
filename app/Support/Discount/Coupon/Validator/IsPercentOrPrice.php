<?php


namespace App\Support\Discount\Coupon\Validator;


use App\Models\Coupon;
use App\Support\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;
use App\Support\Discount\Exceptions\IllegalCouponException;

class IsPercentOrPrice extends AbstractCouponValidator
{
    private $nextValidator;

    /**
     * @method validate(\App\Models\Coupon $coupon)
     */


    public function validate(Coupon $coupon)
    {
        if ($coupon->isNotPercentOrPrice()){
            throw new IllegalCouponException();
        }

        return parent::validate($coupon);



    }
}
