<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcoProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eco_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->float('price');
            $table->integer('stock');
            $table->text('facts');
            $table->text('description');
            $table->text('categories');
            $table->float('emision');
            $table->integer('product_life');
            $table->text('photo');
            $table->bigInteger('not_eco_product_id')->unsigned();
            $table->foreign('not_eco_product_id')->references('id')->on('not_eco_products');
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
        Schema::dropIfExists('eco_products');
    }
}
