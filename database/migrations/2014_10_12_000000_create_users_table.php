<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(5);
            $table->string('name')->default('not available');
            $table->string('email')->unique();
            $table->string('phone')->default('not available');
            $table->string('address')->default('not available');
            $table->string('city')->default('not available');
            $table->string('country')->default('not available');
            $table->string('zip')->default('not available');
            $table->string('bio')->default('not available');
            $table->string('password')->default('not available');
            $table->string('path')->default('user.png');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
