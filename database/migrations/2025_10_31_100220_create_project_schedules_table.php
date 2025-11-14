<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('intermilan_id')->nullable();
            $table->integer('daily_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->string('vessel')->nullable();
            $table->string('description')->nullable();
            $table->integer('port_id')->nullable();
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
        Schema::dropIfExists('project_schedules');
    }
}
