<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFileldsToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_to_user', function (Blueprint $table) {
            $table->string('full_date')->after('id')->nullable();
            $table->string('num_month')->after('full_date')->nullable();
            $table->integer('year')->after('num_month')->default(0);
            $table->integer('bonus')->after('year')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoice_to_user', function (Blueprint $table) {
            $table->dropColumn('full_date');
            $table->dropColumn('num_month');
            $table->dropColumn('year');
            $table->dropColumn('bonus');
        });
    }
}
