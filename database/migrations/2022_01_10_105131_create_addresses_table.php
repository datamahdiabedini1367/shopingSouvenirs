<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title')->comment('عنوان');
            $table->string('state')->comment('استان');
            $table->string('city')->comment('شهر');
            $table->text('address')->comment('آدرس کامل');
            $table->text('description')->comment('توضیحات')->nullable();
            $table->string('postal_code')->comment('کد پستی');
            $table->string('receiver')->nullable()->comment('نام تحویل گیرنده');
            $table->string('phone_number')->nullable()->comment('شماره تماس');
            $table->string('slug');
            $table->tinyInteger('default')->nullable();


            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('addresses');
    }
}
