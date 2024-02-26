<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrPeriodicsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('vdr_periodics', function (Blueprint $table) {
         $table->id();
         $table->integer('vdr_id');
         $table->string('activity')->nullable();
         $table->time('rob_time')->nullable();
         $table->bigInteger('rob_value')->nullable();
         $table->bigInteger('rob_actual')->nullable();
         $table->bigInteger('rob_diff')->nullable();
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
        Schema::dropIfExists('vdr_periodics');
    }
}
