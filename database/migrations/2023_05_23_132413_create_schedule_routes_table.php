<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleRoutesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('schedule_routes', function (Blueprint $table) {
         $table->id();
         $table->mediumInteger('schedule_id');
         $table->mediumInteger('port_id');
         $table->smallInteger('rank');
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
      Schema::dropIfExists('schedule_routes');
   }
}
