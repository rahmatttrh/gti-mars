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
         // $table->smallInteger('type_id');
         $table->smallInteger('type');
         $table->smallInteger('status');
         $table->date('date')->nullable();
         $table->mediumInteger('vessel_id')->nullable();
         $table->mediumInteger('origin_id')->nullable();
         $table->mediumInteger('destination_id')->nullable();
         $table->dateTime('etd')->nullable();
         $table->dateTime('eta')->nullable();
         $table->string('remark')->nullable();
         $table->timestamps();
         // $table->mediumInteger('cargo_id')->nullable();
         // $table->string('func')->nullable();
         // $table->string('station')->nullable();
         // $table->string('activity')->nullable();
         // $table->string('req_boat')->nullable();

         // $table->mediumInteger('jetty_id')->nullable();
         // $table->date('date')->nullable();
         // $table->time('docking')->nullable();
         // $table->time('departure')->nullable();
         // $table->time('return')->nullable();


         // $table->time('arrival')->nullable();


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
