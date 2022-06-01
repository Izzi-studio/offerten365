<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldTypeGenerateInvoiceToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoice_to_user', function (Blueprint $table) {
            $table->integer('pay_type_generated')->after('bonus')->default(0);
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

            $table->dropColumn('pay_type_generated');
        });
    }
}
