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
         $table->mediumInteger('party_id');
         $table->mediumInteger('schedule_id')->nullable();
         $table->mediumInteger('origin_id')->nullable();
         $table->mediumInteger('destination_id')->nullable();
         $table->date('departure');
         $table->date('return')->nullable();
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
