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
            $table->string('sku')->unique()->index();
            $table->string('name');
            $table->string('ean')->unique();
            $table->longText('description');
            $table->enum('category',['frozen_food','sausage','pate']);
            $table->string('image');
            $table->string('brand');
            $table->double('gross_base_price');
            $table->integer('tax');
            $table->double('weight');
            $table->boolean('donation_eligible');
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
