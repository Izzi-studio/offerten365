<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPagesDescriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_pages_description', function (Blueprint $table) {
            $table->id();
            $table->integer('custom_page_id');
            $table->string('locale')->nullable();
            $table->string('b1_image')->nullable();
            $table->text('b1_text')->nullable();
            $table->text('b1_btn')->nullable();
            $table->text('b2_title')->nullable();
            $table->text('b2_content')->nullable();
			$table->string('b3_image')->nullable();
            $table->text('b3_text')->nullable();
            $table->text('b3_btn')->nullable();
			$table->string('b4_image')->nullable();
            $table->text('b4_text')->nullable();
            $table->text('b4_btn')->nullable();
            $table->text('b5_title')->nullable();
            $table->text('b5_content')->nullable();
			$table->string('b6_image')->nullable();
            $table->text('b6_text')->nullable();
            $table->text('b6_btn')->nullable();
            $table->text('b7_seo_text')->nullable();
			$table->string('b8_image')->nullable();
            $table->text('b8_text')->nullable();
            $table->text('b8_btn')->nullable();
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
        Schema::dropIfExists('custom_pages_description')->nullable();
    }
}
