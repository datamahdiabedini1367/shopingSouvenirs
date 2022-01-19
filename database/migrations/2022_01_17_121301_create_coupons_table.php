<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code',20)->unique();
            $table->tinyInteger('percent')->nullable()->comment('درصد تخفیف');
            $table->unsignedBigInteger('limit')->nullable()->comment('سقف خرید برای خرید های بالای این مبلغ تخفیف اعمال می شود');
            $table->unsignedBigInteger('price')->nullable()->comment('بابت تخفیف مبلغ خریدی : این مبلغ درصورتی که مبلغ خرید بالای سقف خرید باشد این مبلغ از حساب کسر میشود');
            $table->date('expire_time')->nullable()->comment('مدت زمان استفاده از این تخفیف');
            $table->unsignedBigInteger('couponable_id')->comment('این کد تخفیف به باید به یکی از این ای دی ها  اعمال شود.1-کاربر 2-محصولات ');
            $table->string('couponable_type',100)->comment('این کد تخفیف باید به نام یکی از این کلاس باید اعمال شود.1-کاربر 2-محصولات ');
            $table->tinyInteger('is_active')->default(1)->comment('کد تخفیف فعال است یا خیر');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
    }
}
