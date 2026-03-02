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
         $table->integer('schedule_id');
         $table->integer('request_id');
         $table->integer('cargoitem_id')->nullable();
         $table->integer('employee_id');
         $table->integer('deflection_id')->nullable(); 
         $table->integer('qty');
         $table->integer('offloading');
         $table->integer('onboard');
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
      Schema::dropIfExists('offloadings');
   }
}
