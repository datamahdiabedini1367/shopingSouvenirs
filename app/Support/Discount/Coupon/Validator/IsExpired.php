<?php


namespace App\Support\Discount\Coupon\Validator;


use App\Models\Coupon;
use App\Support\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;
use App\Support\Discount\Coupon\Validator\Contracts\CouponValidatoreInterface;
use App\Support\Discount\Exceptions\CouponHasExpiredException;

class IsExpired extends AbstractCouponValidator
{
    private $nextValidator;

    /**
     * @method validate(\App\Models\Coupon $coupon)
     *
     * @param Coupon $coupon
     * @return bool|void
     */


    public function validate(Coupon $coupon)
    {
        if ($coupon->isExpired()){
            throw new CouponHasExpiredException();
        }

        return parent::validate($coupon);



    }
}
