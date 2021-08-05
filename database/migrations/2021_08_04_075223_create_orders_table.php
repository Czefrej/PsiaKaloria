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
            $table->enum('status',['unpaid','paid','packed','sent','in_pickup_point','delivered','returned','cancelled']);
            $table->boolean('is_donation');
            $table->unsignedBigInteger('shelter_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('saved_address_id');
            $table->string('order_page_url');
            $table->double('due');
            $table->double('paid');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('shelter_id')->references('id')->on('animal_shelters')->onDelete('cascade');
            $table->foreign('saved_address_id')->references('id')->on('saved_addresses')->onDelete('cascade');
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
