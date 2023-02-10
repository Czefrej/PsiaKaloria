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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('tracking_number');
            $table->decimal('weight',8,2);
            $table->decimal('net_price',8,2);
            $table->enum('type', ['paczkomat', 'dpd', 'inpost', 'dpd_pickup', 'odbior', 'fba']);
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('shipments');
    }
};
