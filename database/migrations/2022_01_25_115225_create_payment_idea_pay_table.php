<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentIdeaPayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_idea_pay', function (Blueprint $table) {
            $table->id();
            $table->string('referenceId')->nullable();
            $table->string('amount')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('status')->nullable();
            $table->integer('hash')->nullable();
            $table->integer('transaction_id')->nullable();
            $table->string('transaction_uuid')->nullable();
            $table->integer('payment_request_id')->nullable();
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
        Schema::dropIfExists('payment_idea_pay');
    }
}
 