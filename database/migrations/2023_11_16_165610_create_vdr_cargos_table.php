<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_cargos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vdr_id');
            $table->tinyInteger('heading_id');
            $table->smallInteger('opening')->nullable();
            $table->smallInteger('consumption')->nullable();
            $table->smallInteger('received')->nullable();
            $table->smallInteger('transferred')->nullable();
            $table->smallInteger('closing')->nullable();
            $table->string('remarks')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('vdr_cargos');
    }
}
