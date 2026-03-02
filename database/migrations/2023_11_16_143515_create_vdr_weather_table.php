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
        Schema::create('vdr_weathers', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->unsignedInteger('vdr_id');
            $table->unsignedTinyInteger('heading_id');
            $table->string('t_0006')->nullable();
            $table->string('t_0612')->nullable();
            $table->string('t_1218')->nullable();
            $table->string('t_1824')->nullable();
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
