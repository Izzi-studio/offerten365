<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsMainPageDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews_main_page_description', function (Blueprint $table) {
            $table->id();
            $table->integer('review_id');
            $table->string('name')->nullable();;
            $table->string('message')->nullable();;
            $table->string('locale')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews_main_page_description');
    }
}
