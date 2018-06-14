<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_deals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('path');
            $table->string('category');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('title');
            $table->string('available');
            $table->string('soldout');
            $table->integer('user_id')->index()->nullable();
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
        Schema::drop('daily_deals');
    }
}
