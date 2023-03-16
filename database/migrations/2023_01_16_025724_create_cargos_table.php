<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wo_id')->nullable();
            $table->string('doc_no');
            $table->string('description');
            $table->integer('qty');
            $table->string('unit', 20);
            $table->decimal('ton', $precision =  6, $scale = 2);
            $table->decimal('m3', $precision =  6, $scale = 2);
            $table->string('status', '3')->default('0');
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
        Schema::dropIfExists('cargos');
    }
}
