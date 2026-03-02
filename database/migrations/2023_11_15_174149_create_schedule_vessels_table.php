<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleVesselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_vessels', function (Blueprint $table) {
            $table->id();
            $table->integer('vessel_id');
            $table->integer('monday_id')->nullable();
            $table->integer('tuesday_id')->nullable();
            $table->integer('wednesday_id')->nullable();
            $table->integer('thursday_id')->nullable();
            $table->integer('friday_id')->nullable();
            $table->integer('saturday_id')->nullable();
            $table->integer('sunday_id')->nullable();
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
        Schema::dropIfExists('schedule_vessels');
    }
}
