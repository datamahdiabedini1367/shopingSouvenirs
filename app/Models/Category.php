<?php

namespace App\Models;

use App\Support\Discount\Coupon\Traits\Couponable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory,Couponable;

    public function products()
    {
        return $this->hasMany(Product::class ,'product_id' , 'id');
    }
}
