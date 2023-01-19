<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('schedules', function (Blueprint $table) {
         $table->id();
         $table->smallInteger('type');
         $table->smallInteger('status');
         $table->mediumInteger('vessel_id');
         $table->mediumInteger('cargo_id')->nullable();
         $table->mediumInteger('origin_id');
         $table->mediumInteger('jetty_id');
         $table->date('date');
         $table->time('docking');
         $table->time('departure');

         $table->mediumInteger('destination_id');
         $table->dateTime('arrival');
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
      Schema::dropIfExists('schedules');
   }
}
