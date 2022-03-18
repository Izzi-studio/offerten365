<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_to_user', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->default(0);
            $table->integer('user_id');
            $table->integer('invoice_number');
            $table->integer('total');
            $table->string('period', 100);
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
        Schema::dropIfExists('invoice_to_user');
    }
}
