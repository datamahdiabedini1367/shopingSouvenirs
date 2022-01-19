<?php

namespace App\Models;

use Database\Seeders\ProductTableSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
