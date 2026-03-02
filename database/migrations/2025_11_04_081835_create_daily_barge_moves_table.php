<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyBargeMovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_barge_moves', function (Blueprint $table) {
            $table->id();
            $table->integer('daily_id')->nullable();
            $table->integer('barge_id')->nullable();
            $table->string('barge')->nullable();
            $table->string('route')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->string('vessel')->nullable();
            $table->date('date')->nullable();
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
        Schema::dropIfExists('daily_barge_moves');
    }
}
