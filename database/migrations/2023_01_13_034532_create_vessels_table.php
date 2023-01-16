<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('vessels', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('imo')->nullable();
         $table->string('type')->nullable();
         $table->string('flag')->nullable();
         $table->string('owner')->nullable();
         $table->string('operator')->nullable();
         $table->integer('kubikasi')->nullable();
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
      Schema::dropIfExists('vessels');
   }
}
