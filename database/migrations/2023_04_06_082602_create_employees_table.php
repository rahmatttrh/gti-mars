<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('employees', function (Blueprint $table) {
         $table->id();
         $table->integer('department_id')->nullable();
         $table->integer('port_id');
         $table->string('code')->nullable();
         $table->string('name');
         $table->string('username');
         $table->string('email');
         $table->string('ekstensi');
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
      Schema::dropIfExists('employees');
   }
}
