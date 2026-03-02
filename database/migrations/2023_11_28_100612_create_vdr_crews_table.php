<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_crews', function (Blueprint $table) {
            $table->id();
            $table->string('is_crew', 1)->default('0');
            $table->string('name');
            $table->string('rank')->nullable();
            $table->string('company')->nullable();
            $table->unsignedInteger('vdr_id');
            $table->unsignedInteger('crew_id')->nullable();
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
        Schema::dropIfExists('vdr_crews');
    }
}
