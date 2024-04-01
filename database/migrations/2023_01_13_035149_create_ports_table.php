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
         $table->string('func')->nullable();
         // $table->integer('port_id')->nullable();
         $table->string('code')->nullable();
         $table->string('name');
         $table->string('email');
         $table->string('type');
         $table->string('region')->nullable();
         $table->string('txid')->nullable();
         $table->string('imo')->nullable();
         $table->string('mmsi')->nullable();
         $table->string('latitude')->nullable();
         $table->string('longitude')->nullable();

         $table->integer('port_id')->nullable();
         $table->string('platform')->nullable();
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
