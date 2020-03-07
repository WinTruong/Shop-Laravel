<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->after('password')->nullable();
            $table->string('address')->after('phone')->nullable();
            $table->bigInteger('country')->after('address')->nullable();
            $table->string('avatar')->after('country')->default("1-old.jpg");
            $table->longText('message')->after('avatar')->nullable();
            $table->unsignedInteger('level')->after('remember_token')->default(1)->comment='1:admin 0:member';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_users_table', function (Blueprint $table) {
            //
        });
    }
}
