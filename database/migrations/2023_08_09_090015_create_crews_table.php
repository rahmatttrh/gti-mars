<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrewsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('crews', function (Blueprint $table) {
         $table->id();
         $table->string('name');
         $table->string('barcode');
         $table->string('department');
         $table->string('company');
         $table->string('desc')->nullable();
         $table->smallInteger('status')->nullable();
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
      Schema::dropIfExists('crews');
   }
}
