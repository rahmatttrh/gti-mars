<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaxSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pax_schedules', function (Blueprint $table) {
            $table->id();
            
            $table->integer('intermilan_id')->nullable();
            $table->integer('daily_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->integer('vessel')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('pax_schedules');
    }
}
