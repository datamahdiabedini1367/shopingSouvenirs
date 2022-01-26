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
        $coupon = $this->validCoupon;
        if ($coupon->isNotEmpty()) {
            $discountCalculator = resolve(DiscountCalculator::class);
            return $discountCalculator->discountedPrice($coupon->first(), $this->price);
        }
        return $this->price;

    }

    public function getPercentAttribute()
    {
        $coupon = $this->validCoupon->first();

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
        return $this->validCoupon->first()->percent ?? 0;
    }



    public function getFirstPictureAttribute()
    {
        return !is_null($this->pictures->first())
            ? str_replace('public','/storage',$this->pictures->first()->path)
            :'';
    }


    public function getImageAttribute()
    {
        return $this->getFirstPictureAttribute();
    }

    public function getRelatedProductAttribute($id)
    {
        return $this->category->products()->where('id' ,'!=' ,$id)->get();

    }

    public function getPriceFormatedAttribute()
    {
        return number_format($this->price);
    }

//    public function getQuantityAttribute()
//    {
//        dd(session()->all());
//    }

//    public function getTotalPriceAttribute()
//    {
//        return ($this->getPriceWithDiscountAttribute() * $this->orders()->quantity);
//    }







}
