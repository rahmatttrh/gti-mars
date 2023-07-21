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
         $table->string('type')->nullable();
         $table->integer('offloading_id')->nullable();
         $table->string('status');
         $table->string('no_doc');
         $table->string('mtd')->nullable();
         $table->string('contract')->nullable();
         $table->string('desc');
         $table->string('unit')->nullable();
         $table->decimal('size', 6, 2)->nullable();
         $table->decimal('weight', 6, 2)->nullable();
         $table->smallInteger('qty');
         $table->string('remark')->nullable();
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
