<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('parties', function (Blueprint $table) {
         $table->id();
         $table->mediumInteger('platform_id');
         $table->string('name');
         $table->string('tagline')->nullable();
         $table->string('email');
         $table->text('desc')->nullable();
         $table->smallInteger('type');
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
      Schema::dropIfExists('parties');
   }
}
