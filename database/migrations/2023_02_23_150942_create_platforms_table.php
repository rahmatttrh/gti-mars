<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatformsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('platforms', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('system');
         $table->string('tagline')->nullable();
         $table->string('email');
         $table->text('desc')->nullable();
         $table->string('logo')->nullable();
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
      Schema::dropIfExists('platforms');
   }
}
