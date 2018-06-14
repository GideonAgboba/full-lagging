<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index()->unsigned();
            $table->integer('category_id')->index()->unsigned();
            $table->integer('vendor_id');
            $table->string('title');
            $table->string('percentage_off')->nullable();
            $table->string('description');
            $table->string('min_price');
            $table->string('max_price');
            $table->string('color')->nullable();
            $table->string('path1');
            $table->string('path2')->nullable();
            $table->string('path3')->nullable();
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
        Schema::drop('products');
    }
}
