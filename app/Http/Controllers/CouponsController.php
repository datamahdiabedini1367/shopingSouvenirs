<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Support\Discount\Coupon\CouponValidator;
use App\Support\Discount\Exceptions\CouponHasExpiredException;
use App\Support\Discount\Exceptions\PurchaseAmountLessThanCeilingException;
use Illuminate\Http\Request;

class CouponsController extends Controller
{

    private $validator;

    public function __construct(CouponValidator $validator)
    {
        $this->middleware('auth');
        $this->validator = $validator;

    }

    /***
     * apply code discount on basket
     * @param Request $request
     */
    public function apply(Request $request)
    {
        /**validate Coupon*/
        try {
            $request->validate([
                'coupon' => ['required', 'exists:coupons,code'],
            ]);

            /**can user use it*/

            $coupon = Coupon::query()->where('code', $request->coupon)->firstOrFail();


            $this->validator->isValid($coupon);

            /**put coupon into session user */

            session()->put(['coupon' => $coupon]);
            /**redirect user */
            return redirect()->back()->withSuccess('کد تخفیف با موفقیت اعمال شد.');

        } catch (CouponHasExpiredException $exception) {
            return redirect()->back()->withError("اعتبار کد تخفیف شما به پایان رسیده است .");
        } catch (PurchaseAmountLessThanCeilingException $exception) {
            return redirect()->back()->withError("میزان خرید شما کمتر از {$exception->limit} تومان  می باشد.");
        } catch (\Exception $exception) {
            return redirect()->back()->withError("کد تخفیف نامعتبر می باشد.");

        }

    }

    public function remove()
    {
        session()->forget('coupon');
        return back();
    }
}
