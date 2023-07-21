<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('reports', function (Blueprint $table) {
         $table->id();
         $table->mediumInteger('schedule_id');
         $table->mediumInteger('vessel_id')->nullable();
         $table->mediumInteger('employee_id')->nullable();
         $table->mediumInteger('status_id');
         $table->mediumInteger('port_id')->nullable();
         // $table->dateTime('assign')->nullable();
         // $table->dateTime('standby')->nullable();
         // $table->dateTime('loading_start')->nullable();
         // $table->dateTime('loading_end')->nullable();
         // $table->dateTime('castoff')->nullable();
         // $table->dateTime('fullaway')->nullable();
         // $table->dateTime('arrive')->nullable();
         // $table->dateTime('standby_dest')->nullable();
         // $table->dateTime('unloading_start')->nullable();
         // $table->dateTime('unloading_end')->nullable();
         // $table->dateTime('complete')->nullable();
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
      Schema::dropIfExists('reports');
   }
}
