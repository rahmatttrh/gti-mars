<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveillanceCrewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveillance_crews', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->integer('surveillance_id');
            $table->integer('employee_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('origin_id')->nullable();
            $table->integer('destination_id')->nullable();
            $table->string('name')->nullable();
            $table->string('barcode')->nullable();
            $table->string('department')->nullable();
            $table->string('company')->nullable();
            $table->string('desc')->nullable();
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
        Schema::dropIfExists('surveillance_crews');
    }
}
