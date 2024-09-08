<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epaper_pages', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('page_number')->nullable();
            $table->text('page_image')->nullable();
//
//            $table->integer('page_number2')->nullable();
//            $table->text('page_image2')->nullable();
//
//            $table->integer('page_number3')->nullable();
//            $table->text('page_image3')->nullable();
//
//            $table->integer('page_number4')->nullable();
//            $table->text('page_image4')->nullable();
//
//            $table->integer('page_number5')->nullable();
//            $table->text('page_image5')->nullable();
//
//            $table->integer('page_number6')->nullable();
//            $table->text('page_image6')->nullable();
//
//            $table->integer('page_number7')->nullable();
//            $table->text('page_image7')->nullable();
//
//            $table->integer('page_number8')->nullable();
//            $table->text('page_image8')->nullable();
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
        Schema::dropIfExists('epaper_pages');
    }
};
