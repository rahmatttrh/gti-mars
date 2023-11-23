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
            $table->unsignedTinyInteger('heading_id');
            $table->string('0006');
            $table->string('0612');
            $table->string('1218');
            $table->string('1824');
            $table->string('status', 3)->default('1');
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
