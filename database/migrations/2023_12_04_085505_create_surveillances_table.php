<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveillancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveillances', function (Blueprint $table) {
            $table->id();
            $table->integer('status')->nullable();
            $table->integer('port_id')->nullable();
            $table->integer('vessel_id')->nullable();
            $table->date('date')->nullable();
            $table->integer('total_weight')->nullable();
            $table->integer('total_size')->nullable();
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
        Schema::dropIfExists('surveillances');
    }
}
