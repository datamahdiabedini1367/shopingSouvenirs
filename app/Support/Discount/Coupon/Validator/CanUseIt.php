<?php


namespace App\Support\Discount\Coupon\Validator;


use App\Models\Coupon;
use App\Support\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;
use App\Support\Discount\Coupon\Validator\Contracts\CouponValidatoreInterface;
use App\Support\Discount\Exceptions\CouponHasExpiredException;
use App\Support\Discount\Exceptions\IllegalCouponException;
use Illuminate\Support\Facades\Auth;

class CanUseIt extends AbstractCouponValidator
{
    private $nextValidator;

    /**
     * check user can use as code discount
     * @method validate(\App\Models\Coupon $coupon)
     *
     */


    public function validate(Coupon $coupon)
    {


        if (!auth()->user()->coupons->contains($coupon) ){
            throw new IllegalCouponException();
        }

        return parent::validate($coupon);



    }
}
