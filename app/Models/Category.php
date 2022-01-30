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
        'parent_id'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
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

    public function allSubCategoryProducts()
    {
        $childernIds = $this->children()->pluck('id')->get();

        return Product::query()->whereIn('category_id',$childernIds)->get();
    }



//    public function subCateogry($category_id)
//    {
//        $category = Category::query()->where('id',$category_id)->first();
//        $category_item = [];
//        while(!is_null($category->category_id)){
//            $category_item[]=$category->id;
//
//            $category = Category::query()->where('id',$category->category_id)->first();
//            dump($category);
//        }
//        $category_item[]=$category->id;
//
//    }

}
