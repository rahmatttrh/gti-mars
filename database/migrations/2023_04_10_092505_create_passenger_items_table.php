<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassengerItemsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('passenger_items', function (Blueprint $table) {
         $table->id();
         $table->integer('request_id');
         $table->string('type')->nullable();
         $table->integer('crew_id');
         // $table->string('name')->nullable();
         // $table->string('barcode')->nullable();
         // $table->string('department')->nullable();
         // $table->string('company')->nullable();
         $table->string('desc')->nullable();
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
      Schema::dropIfExists('passenger_items');
   }
}
