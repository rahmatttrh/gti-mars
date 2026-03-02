<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeflectionsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('deflections', function (Blueprint $table) {
         $table->id();
         $table->integer('request_id');
         $table->integer('cargoitem_id')->nullable();
         $table->integer('qty')->nullable();
         $table->integer('port_id');
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
      Schema::dropIfExists('deflections');
   }
}
