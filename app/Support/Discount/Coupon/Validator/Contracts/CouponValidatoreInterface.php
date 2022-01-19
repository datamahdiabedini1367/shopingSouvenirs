<?php


namespace App\Support\Discount\Coupon\Validator\Contracts;


use App\Models\Coupon;

interface CouponValidatoreInterface
{

    public function setNextValidator(CouponValidatoreInterface $validator);

    public function validate(Coupon $coupon);

}
