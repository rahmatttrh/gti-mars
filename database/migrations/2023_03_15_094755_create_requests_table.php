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
         $table->smallInteger('department_id');
         $table->smallInteger('type_id');
         $table->smallInteger('activity_id');
         $table->smallInteger('origin_id');
         $table->smallInteger('destination_id');
         $table->date('date');
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
