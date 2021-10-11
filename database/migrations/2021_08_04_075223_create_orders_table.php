<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigInteger('id')->unique()->index();
            $table->enum('status',['unpaid','paid','packed','sent','in_pickup_point','delivered','returned','cancelled','unknown']);
            $table->boolean('is_donation');
            $table->unsignedBigInteger('shelter_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('saved_address_id')->nullable();
            $table->unsignedBigInteger('delivery_payment_id');

            $table->string('order_page_url');
            $table->enum('source',['personal','allegro','store_old','store_new','amazon']);
            $table->double('due');
            $table->double('paid');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shelter_id')->references('id')->on('animal_shelters')->onDelete('cascade');
            $table->foreign('saved_address_id')->references('id')->on('saved_addresses')->onDelete('cascade');
            $table->foreign('delivery_payment_id')->references('id')->on('delivery_payment_availability')->onDelete('cascade');

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
}
