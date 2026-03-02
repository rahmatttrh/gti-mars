<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('logs', function (Blueprint $table) {
         $table->id();
         $table->string('system');
         $table->integer('user_id');
         $table->integer('vessel_id')->nullable();
         $table->string('action');
         $table->integer('vdr_id')->nullable();
         $table->string('desc')->nullable();
         $table->string('table')->nullable();
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
      Schema::dropIfExists('logs');
   }
}
