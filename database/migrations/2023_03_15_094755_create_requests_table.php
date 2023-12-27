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
         $table->integer('rank')->nullable();
         $table->mediumInteger('parent_id')->nullable();
         $table->string('code')->nullable();
         $table->string('bcm')->nullable();
         $table->smallInteger('status');
         $table->smallInteger('type')->nullable();

         $table->smallInteger('schedule_id')->nullable();
         $table->string('by')->nullable();
         $table->smallInteger('employee_id')->nullable();
         $table->smallInteger('user_id')->nullable();
         $table->string('class')->nullable();

         $table->date('date')->nullable();
         $table->smallInteger('department_id')->nullable();
         $table->string('func')->nullable();
         $table->string('desc')->nullable();
         // $table->smallInteger('type_id');
         $table->smallInteger('activity_id')->nullable();
         $table->integer('qty')->nullable();
         $table->integer('qty_approve')->nullable();
         $table->string('description')->nullable();
         $table->smallInteger('origin_id')->nullable();
         $table->smallInteger('destination_id')->nullable();
         $table->string('destination_name')->nullable();
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
