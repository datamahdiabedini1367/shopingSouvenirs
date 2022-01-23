<?php

namespace App\Models;

use App\Support\Discount\Coupon\Traits\Couponable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, Couponable;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'icon',
        'category_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id');

    }

    public function getParentCategoryNameAttribute()
    {
        return $this->parent->name ?? 'دسته اصلی';

    }

}
