<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostponesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('postpones', function (Blueprint $table) {
         $table->id();
         $table->smallInteger('status');
         $table->mediumInteger('schedule_id');
         $table->dateTime('from');
         $table->dateTime('to');
         $table->string('reason');
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
      Schema::dropIfExists('postpones');
   }
}
