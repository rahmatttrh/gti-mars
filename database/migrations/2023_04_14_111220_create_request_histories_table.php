<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestHistoriesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('request_histories', function (Blueprint $table) {
         $table->id();
         $table->smallInteger('request_id');
         $table->dateTime('date')->nullable();
         $table->string('reason')->nullable();
         $table->dateTime('approve')->nullable();
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
      Schema::dropIfExists('request_histories');
   }
}
