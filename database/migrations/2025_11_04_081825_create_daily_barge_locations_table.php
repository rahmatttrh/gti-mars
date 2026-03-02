<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyBargeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_barge_locations', function (Blueprint $table) {
            $table->id();
            $table->integer('daily_id')->nullable();
            $table->integer('barge_id')->nullable();
            $table->string('barge')->nullable();
            $table->string('loc')->nullable();
            $table->string('area')->nullable();
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
        Schema::dropIfExists('daily_barge_locations');
    }
}
