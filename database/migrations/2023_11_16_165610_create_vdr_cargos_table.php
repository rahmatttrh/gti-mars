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
            $table->smallInteger('opening')->default(0);
            $table->smallInteger('consumption')->default(0);
            $table->smallInteger('received')->default(0);
            $table->smallInteger('transferred')->default(0);
            $table->smallInteger('closing')->default(0);
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
