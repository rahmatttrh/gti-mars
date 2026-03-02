<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentRequestsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('parent_requests', function (Blueprint $table) {
         $table->id();
         // $table->mediumInteger('parent_id');
         $table->mediumInteger('activity_id');
         $table->smallInteger('status');
         $table->string('code');
         $table->mediumInteger('origin_id');
         $table->date('date');
         $table->mediumInteger('user_id');
         $table->mediumInteger('employee_id');
         $table->mediumInteger('department_id');
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
      Schema::dropIfExists('parent_requests');
   }
}
