<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActualRequestsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      // Schema::create('actual_requests', function (Blueprint $table) {
      //    $table->id();
      //    $table->integer('request_id');
      //    $table->integer('qty')->nullable();
      //    $table->integer('port_id');
      //    $table->string('desc');
      //    $table->timestamps();
      // });
   }

   /**
    * Reverse the migrations.
    *
    * @return void
    */
   public function down()
   {
      // Schema::dropIfExists('actual_requests');
   }
}
