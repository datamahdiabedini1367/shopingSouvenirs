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

    public function getAddressAttribute()
    {

        return !is_null($this->path)
            ? str_replace('public','/storage',$this->path)
            :'';
    }
}
