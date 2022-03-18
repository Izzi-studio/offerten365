<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->integer('type_job_id');
            $table->integer('region_id');
            $table->integer('user_id');
            $table->string('description',500)->nullable();
            $table->longText('additional_info');
            $table->date('date_start');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('proposals_to_partner', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('proposal_id')->unsigned()->index();
            $table->integer('user_id');
            $table->integer('status')->default(0);
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('message',500)->nullable();
            $table->integer('user_id_from')->default(0);
            $table->integer('user_id_to')->default(0);
            $table->integer('rating')->default(0);
            $table->bigInteger('proposal_id')->unsigned()->index();
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proposals');
        Schema::dropIfExists('proposals_to_partner');
        Schema::dropIfExists('reviews');
    }
}
