<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('cargos', function (Blueprint $table) {
         // $table->id();
         // $table->bigInteger('wo_id')->nullable();
         // $table->string('doc_no');
         // $table->string('description');
         // $table->integer('qty');
         // $table->string('unit', 20);
         // $table->decimal('ton', $precision =  6, $scale = 2);
         // $table->decimal('m3', $precision =  6, $scale = 2);
         // $table->string('status', '3')->default('0');
         // $table->timestamps();
         $table->id();
         $table->mediumInteger('request_id');
         $table->string('type');
         $table->integer('offloading_id')->nullable();
         $table->string('status');
         $table->string('no_doc');
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
      Schema::dropIfExists('cargos');
   }
}
