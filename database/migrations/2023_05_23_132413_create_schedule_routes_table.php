<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PhpParser\Node\NullableType;

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
         $table->smallInteger('status')->nullable();
         $table->mediumInteger('schedule_id');
         $table->integer('request_id')->nullable();
         $table->mediumInteger('port_id');
         $table->smallInteger('rank')->nullable();
         $table->date('date')->nullable();
         
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
