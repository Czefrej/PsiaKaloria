<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageStatusHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_status_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->string("system_code");
            $table->dateTime("datetime");
            $table->string("depot_code");
            $table->string("depot_name");
            $table->string("country")->nullable();

            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_status_history');
    }
}
