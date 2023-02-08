<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_history', function (Blueprint $table) {
            $table->id()->autoIncrement()->index();
            $table->string('sku');
            $table->double('net_cogs');
            $table->double('net_packaging_price');
            $table->double('weight');
            $table->string('tax_group');
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
        Schema::dropIfExists('products_history');
    }
}
