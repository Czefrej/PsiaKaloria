<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->integer('order_id')->primary();
            $table->string('ext_order_id', 64)->index();
            $table->string('source', 32);
            $table->date('date');
            $table->string('country_code', 4);
            $table->string('postal_code');
            $table->boolean('allegro_smart');
            $table->decimal('delivery_net_price',8,2);
            $table->boolean('cod');
            $table->enum('currency', ['EUR', 'USD', 'PLN']);
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
        Schema::dropIfExists('orders');
    }
};
