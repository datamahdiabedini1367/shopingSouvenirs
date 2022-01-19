<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('code',250)->unique();
            $table->bigInteger('amount')->comment('  جمع کل فاکتوراقلام');
            $table->tinyInteger('status')->comment('وضعیت سفارش >==< 0:در حال ثبت; 1:ثبت شده;   2:درحال پردازش و ارسال;   3:ارسال شده/ پایان یافته; 5:لغو سفارش');
            $table->timestamps();
        });

        DB::update('alter table orders AUTO_INCREMENT =100000');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
