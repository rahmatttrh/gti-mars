<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('requests', function (Blueprint $table) {
         $table->id();
         $table->string('code');
         $table->smallInteger('department_id');
         $table->smallInteger('type_id');
         $table->smallInteger('activity_id');
         $table->smallInteger('origin_id')->nullable();
         $table->smallInteger('destination_id')->nullable();
         $table->string('desc')->nullable();
         $table->date('date');
         $table->smallInteger('schedule_id');
         $table->smallInteger('status');
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
      Schema::dropIfExists('requests');
   }
}
