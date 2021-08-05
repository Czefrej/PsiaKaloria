<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavedAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saved_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');

            $table->boolean('company_purchase');

            $table->string('name');
            $table->string('surname');
            $table->string('phone');
            $table->string('company')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('country');

            $table->string('delivery_name');
            $table->string('delivery_surname');
            $table->string('delivery_phone');
            $table->string('delivery_company')->nullable();
            $table->string('delivery_address');
            $table->string('delivery_postal_code');
            $table->string('delivery_city');
            $table->string('delivery_country');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saved_addresses');
    }
}
