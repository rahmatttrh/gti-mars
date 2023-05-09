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
         $table->smallInteger('type');
         $table->smallInteger('schedule_id')->nullable();
         $table->smallInteger('employee_id');
         $table->smallInteger('status');
         $table->date('date');
         $table->smallInteger('department_id');
         $table->string('func')->nullable();
         // $table->smallInteger('type_id');
         $table->smallInteger('activity_id')->nullable();
         $table->string('description')->nullable();
         $table->smallInteger('origin_id')->nullable();
         $table->smallInteger('destination_id')->nullable();
         $table->string('remark')->nullable();
         $table->decimal('total_size', 6, 2)->nullable();
         $table->decimal('total_weight', 6, 2)->nullable();
         $table->dateTime('undo')->nullable();
         $table->string('reason')->nullable();

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
