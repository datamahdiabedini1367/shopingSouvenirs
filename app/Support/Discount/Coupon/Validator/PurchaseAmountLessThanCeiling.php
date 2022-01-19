<?php


namespace App\Support\Discount\Coupon\Validator;


use App\Models\Coupon;
use App\Support\Basket\Basket;
use App\Support\Discount\Coupon\Validator\Contracts\AbstractCouponValidator;
use App\Support\Discount\Exceptions\PurchaseAmountLessThanCeilingException;

/**
 * The purchase amount is less than the purchase ceiling
 *
 * Class PurchaseAmountLessThanCeiling
 * @package App\Support\Discount\Coupon\Validator+
 */
class PurchaseAmountLessThanCeiling extends AbstractCouponValidator
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
        $basket = resolve(Basket::class);
//        dd('PurchaseAmountLessThanCeiling class', $coupon, $coupon->limit, $basket->subTotal());

        if (!is_null($coupon->limit)) {
            if ($basket->subTotal() < $coupon->limit) {
                throw new PurchaseAmountLessThanCeilingException($coupon->limit);
            }
        }


        return parent::validate($coupon);

    }
}
