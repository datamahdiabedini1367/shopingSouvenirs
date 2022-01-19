<?php


namespace App\Support\Discount\Coupon\Validator\Contracts;


use App\Models\Coupon;

abstract class AbstractCouponValidator implements CouponValidatoreInterface
{
    private $nextValidator;

    /**
     * @method  setNextValidator(CouponValidatoreInterface $validator)
     * @method  validate(Coupon $coupon)
     */

    public function setNextValidator(CouponValidatoreInterface $validator)
    {

        $this->nextValidator = $validator;
    }

    public function validate(Coupon $coupon)
    {
        return $this->nextValidator === null
            ? true
            : $this->nextValidator->validate($coupon);
    }

}
