<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname',100)->after('name')->nullable();
            $table->string('company',100)->after('lastname')->nullable();
            $table->string('avatar',255)->after('company')->nullable();
            $table->string('phone',16)->after('avatar')->nullable();
            $table->integer('role_id',1)->after('phone')->nullable();
            $table->string('availability',50)->after('role_id')->nullable();
            $table->string('gender',50)->after('availability')->nullable();
            $table->integer('coins')->after('gender')->default(0);
            $table->integer('status')->after('coins')->default(0);
            $table->integer('status_pay')->after('coins')->default(0);
            $table->integer('active')->after('coins')->default(0);
            $table->string('profile_slug',100)->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company');
            $table->dropColumn('phone');
            $table->dropColumn('role_id');
            $table->dropColumn('availability');
            $table->dropColumn('gender');
            $table->dropColumn('avatar');
            $table->dropColumn('lastname');
        });
    }
}
