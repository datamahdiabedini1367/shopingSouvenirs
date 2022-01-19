<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('name');
            $table->integer('size');
            $table->integer('time')->nullable()->comment('بر مبنای ثانیه');
            $table->string('type')->comment('نوع فایل را نگهداری میکند تصویر فیلم ');
            $table->tinyInteger('is_active')->comment('تصویر یا فایل نمایش داده شود یا خیر');
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
        Schema::dropIfExists('files');
    }
}
