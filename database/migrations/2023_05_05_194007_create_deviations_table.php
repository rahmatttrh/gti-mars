<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviationsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('deviations', function (Blueprint $table) {
         $table->id();
         $table->smallInteger('status');
         $table->smallInteger('schedule_id');
         $table->smallInteger('port_id');
         $table->text('desc');
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
      Schema::dropIfExists('deviations');
   }
}
