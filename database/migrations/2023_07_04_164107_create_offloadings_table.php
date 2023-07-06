<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffloadingsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('offloadings', function (Blueprint $table) {
         $table->id();
         $table->integer('cargoitem_id');
         $table->integer('employee_id');
         $table->integer('qty');
         $table->integer('offloading');
         $table->integer('onboard');
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
      Schema::dropIfExists('offloadings');
   }
}
