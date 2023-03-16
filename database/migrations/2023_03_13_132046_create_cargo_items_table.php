<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargoItemsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('cargo_items', function (Blueprint $table) {
         $table->id();
         $table->mediumInteger('request_id');
         $table->string('no_doc');
         $table->string('desc');
         $table->smallInteger('qty');
         $table->string('unit')->nullable();
         $table->smallInteger('size')->nullable();
         $table->smallInteger('weight')->nullable();
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
      Schema::dropIfExists('cargo_items');
   }
}
