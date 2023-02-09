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
            $table->integer('order_id')->index();
            $table->string('ext_order_id', 64);
            $table->string('source', 32);
            $table->date('date');
            $table->string('country_code', 4);
            $table->string('postal_code');
            $table->boolean('allegro_smart');
            $table->double('delivery_net_price');
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
