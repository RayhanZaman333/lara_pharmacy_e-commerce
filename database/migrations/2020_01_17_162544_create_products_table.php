<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');//integer
            $table->unsignedBigInteger('brand_id');
            $table->string('title');
            $table->text('description');
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('offer_price')->nullable();
            $table->string('image');
            $table->string('status')->default('Active');
            // $table->foreign('category_id')
            //         ->references('id')->on('categories')
            //         ->onDelete('cascade');
            // $table->foreign('brand_id')
            //         ->references('id')->on('brands')
            //         ->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
