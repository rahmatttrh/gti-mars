<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_passengers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vdr_id');
            $table->string('name');
            $table->integer('ranks')->nullable();
            $table->string('company')->nullable();
            $table->string('is_crew', 1)->default('0');
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
        Schema::dropIfExists('vdr_passengers');
    }
}
