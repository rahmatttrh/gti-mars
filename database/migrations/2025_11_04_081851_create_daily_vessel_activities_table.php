<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyVesselActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_vessel_activities', function (Blueprint $table) {
            $table->id();
            $table->integer('daily_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->string('vessel')->nullable();
            $table->string('program')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('daily_vessel_activities');
    }
}
