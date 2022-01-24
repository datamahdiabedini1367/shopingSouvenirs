<?php

namespace App\Models;

use App\Support\Discount\Coupon\Traits\Couponable;
use App\Support\Discount\DiscountCalculator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Couponable;


    protected $fillable = ['name', 'description', 'price', 'stock','category_id','slug'];

    protected $perPage = 9;

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id','id' );
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class, 'product_id', 'id');
    }

    public function hasStock(int $quantity)
    {
        return $this->stock >= $quantity;

    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
            ->withPivot('quantity');
    }


    public function decrementStock(int $count)
    {
        return $this->decrement('stock', $count);
    }

    public function getPriceWithDiscountAttribute()
    {
//        $coupons = $this->category->validCoupons();
//        if ($coupons->isNotEmpty()){
//            $discountCalculator= resolve(DiscountCalculator::class);
//            return $discountCalculator->discountedPrice($coupons->last() , $price);
//        }
//        return  $price;


        $coupon = $this->validCoupon;
//        if ($this->id ===3)
//            dd($coupon());
        if ($coupon->isNotEmpty()) {
            $discountCalculator = resolve(DiscountCalculator::class);
//                    dd(
//                        'getPriceAttribute:',
//                        $coupons ,
//                        $coupons->isNotEmpty(),
//                        $coupons->last(),
//                        $this->price ,
//                        $discountCalculator->discountedPrice($coupons->last() ,$this->price)
//                    );
//$coupons=
            return $discountCalculator->discountedPrice($coupon->first(), $this->price);
        }
        return $this->price;

    }

    public function getPercentAttribute()
    {
        $coupon = $this->validCoupon->first();

//        dd($coupon);
        if ($coupon) {
            return $coupon->percent;
        }
        return 0;

    }

    public function getCategoryNameAttribute()
    {
        return $this->category->name ?? '';
    }



    public function getDiscountAttribute()
    {
//        dd($this->validCoupon->first());
        return $this->validCoupon->first()->percent ?? 0;
    }



    public function getFirstPictureAttribute()
    {
        return !is_null($this->pictures->first())
            ? str_replace('public','/storage',$this->pictures->first()->path)
            :'';
    }







}
