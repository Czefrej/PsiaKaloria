<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id');
            $table->string('tracking_number');
            $table->enum('courier',['paczkomaty','dpd','inpostkurier']);
            $table->enum('status',['could_not_resolve','unknown','created','shipped','not_delivered','out_for_delivery','delivered','return','aviso','in_pickup_point','lost','canceled','on_the_way']);
            $table->unsignedBigInteger('rel_package_id')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('rel_package_id')->references('id')->on('packages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
