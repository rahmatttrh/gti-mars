<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('ports', function (Blueprint $table) {
         $table->smallIncrements('id');
         $table->string('code')->nullable();
         $table->string('name');
         $table->string('email');
         $table->string('type');
         $table->string('txid')->nullable();
         $table->string('imo')->nullable();
         $table->string('mmsi')->nullable();
         $table->string('latitude')->nullable();
         $table->string('longitude')->nullable();
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
      Schema::dropIfExists('ports');
   }
}
