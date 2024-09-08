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
        Schema::create('post_news', function (Blueprint $table) {
            $table->increments('news_id');
            $table->string('news_headline');
            $table->string('news_shoulder')->nullable();
            $table->string('news_keywords')->nullable();
            $table->text('news_highlights')->nullable();
            $table->text('news_body');
            $table->string('category_slug');
            $table->string('news_title_image');
            $table->string('title_image_courtecy');
            $table->string('inner_news_image')->nullable();
            $table->string('inner_image_courtecy')->nullable();
            $table->string('inner_image_para_no')->nullable();
            $table->integer('author_id');
            $table->integer('news_status');
            $table->integer('elected_status')->nullable();
            $table->integer('tot_status')->nullable();
            $table->integer('lead_news_status')->nullable();
            $table->integer('slug');
            $table->integer('auth_id');
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
        Schema::dropIfExists('post_news');
    }
};
