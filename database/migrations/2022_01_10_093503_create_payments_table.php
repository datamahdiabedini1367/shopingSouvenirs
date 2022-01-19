<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->string('method')->comment('نوع پرداخت:از طریق درگاه -درب منزل');
            $table->string('gateway')->nullable()->comment('درگاه پرداخت');
            $table->string('ref_num')->nullable()->comment('شماره پیگیری که بانک به ما می دهد');
            $table->bigInteger('amount')->comment('مبلغ پرداخت شده توسط کاربر');
            $table->tinyInteger('status')->comment('0:Incomplete 1:complete');

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
        Schema::dropIfExists('payments');
    }
}
