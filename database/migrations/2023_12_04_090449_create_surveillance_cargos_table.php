<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveillanceCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveillance_cargos', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->integer('surveillance_id');
            $table->integer('employee_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('origin_id')->nullable();
            $table->integer('destination_id')->nullable();
            $table->string('mtd')->nullable();
            $table->string('desc')->nullable();
            $table->integer('qty')->nullable();
            $table->string('unit')->nullable();
            $table->integer('weight')->nullable();
            $table->integer('size')->nullable();
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
        Schema::dropIfExists('surveillance_cargos');
    }
}
