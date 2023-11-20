<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrWeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_weather', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('vdr_id');
            $table->string('wind');
            $table->string('sea');
            $table->string('visibility');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('status', 3);
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
        Schema::dropIfExists('vdr_weather');
    }
}
