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
        Schema::table('animal_shelters', function (Blueprint $table) {
            $table->decimal('map_latitude', 10, 8)->nullable();
            $table->decimal('map_longitude', 11, 8)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('animal_shelters', function (Blueprint $table) {
            $table->dropColumn('map_latitude');
            $table->dropColumn('map_longitude');
        });
    }
};
