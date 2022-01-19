<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'code',
        'amount',
        'status',      /**'وضعیت سفارش >==< 0:در حال ثبت; 1:ثبت شده;   2:درحال پردازش و ارسال;   3:ارسال شده/ پایان یافته; 5:لغو سفارش'**/
    ];

    const REGISTERING = 0;
    const REGISTERED = 1;
    const PROCESSING = 2;
    const POSTED = 3;
    const CANCEL_ORDER = 5;

    public static function toString($status)
    {
        try {
            return [
                static::REGISTERING => 'در حال ثبت',
                static::REGISTERED => 'ثبت شده',
                static::PROCESSING => 'در حال پردازش و ارسال',
                static::POSTED => 'ارسال شده',
                static::CANCEL_ORDER => 'لغو سفارش',
            ][$status];
        } catch (\Throwable $th) {
            throw new \InvalidArgumentException('status column does not exist.');
        }
    }

    public function products()
    {
        return $this->belongsToMany(Product::class , 'order_product','order_id','product_id' )->withPivot('quantity');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class,'order_id','id');
    }

    public function changeStatus()
    {
        $this->status++;
        $this->save();

    }

    public function cancelOrder()
    {
        $this->status = self::CANCEL_ORDER;
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id' , 'id');

    }
}
