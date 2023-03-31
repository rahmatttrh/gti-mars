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
         $table->dateTime('asign')->nullable();
         $table->dateTime('loading')->nullable();
         $table->dateTime('castoff')->nullable();
         $table->dateTime('fullaway')->nullable();
         $table->dateTime('arrive')->nullable();
         $table->dateTime('return')->nullable();
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
