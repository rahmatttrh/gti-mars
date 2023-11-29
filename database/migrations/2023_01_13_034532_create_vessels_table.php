<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVesselsTable extends Migration
{
   /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
      Schema::create('vessels', function (Blueprint $table) {
         $table->id();
         $table->smallInteger('status')->nullable();
         $table->integer('schedule_id')->nullable();
         $table->mediumInteger('port_id')->nullable();
         $table->string('txid')->nullable();
         $table->string('mmsi')->nullable();
         // $table->string('port')->nullable();
         $table->string('contract_no')->nullable();
         $table->date('contract_start')->nullable();
         $table->date('contract_end')->nullable();
         $table->string('master')->nullable();

         $table->string('latitude')->nullable();
         $table->string('longitude')->nullable();
         $table->string('speed')->nullable();
         $table->string('calcspeed')->nullable();
         $table->string('heading')->nullable();
         $table->string('last_update')->nullable();

         $table->string('name');
         $table->string('username');
         $table->string('email')->nullable();
         $table->string('telp')->nullable();
         $table->string('require')->nullable();
         $table->string('imo')->nullable();
         $table->string('type')->nullable();
         $table->string('prev_name')->nullable();
         $table->string('owner')->nullable();
         $table->string('operator')->nullable();
         $table->string('flag')->nullable();
         $table->string('call_sign')->nullable();
         $table->string('portname')->nullable();
         $table->string('build')->nullable();
         $table->string('classed_by')->nullable();

         $table->string('class_notation')->nullable();
         $table->integer('loa')->nullable();
         $table->integer('beam')->nullable();
         $table->decimal('depth', 6, 2)->nullable();
         $table->decimal('maxdraft', 6, 2)->nullable();
         $table->decimal('deadweight', 6, 2)->nullable();
         $table->decimal('gross', 6, 2)->nullable();
         $table->decimal('deckspace', 6, 2)->nullable();
         $table->decimal('deckstrength', 6, 2)->nullable();
         $table->decimal('deckcapacity', 6, 2)->nullable();

         $table->string('main_engine')->nullable();
         $table->string('no_engine')->nullable();
         $table->string('no_main_propeller')->nullable();
         $table->string('no_rudder')->nullable();
         $table->string('generator')->nullable();
         $table->string('no_generator')->nullable();
         $table->string('generator_detail')->nullable();
         $table->string('kort_nozzle')->nullable();
         $table->string('bow_thruster')->nullable();
         $table->string('stern_thruster')->nullable();
         $table->string('other_propulsor')->nullable();
         $table->string('speed_max')->nullable();
         $table->string('speed_eco')->nullable();
         $table->string('speed_towing')->nullable();
         $table->string('no_berth')->nullable();
         $table->string('berth_detail')->nullable();
         $table->string('crane')->nullable();
         $table->string('comm_system')->nullable();

         $table->string('bunker_type')->nullable();
         $table->string('bunker_capacity')->nullable();
         $table->string('daily_fuel_consumption')->nullable();
         $table->string('potable_water_capacity')->nullable();
         $table->string('potable_water')->nullable();
         $table->string('fifi_pump_capacity')->nullable();
         $table->string('no_immarsat')->nullable();
         $table->string('no_vsat')->nullable();

         $table->string('dpa_name')->nullable();
         $table->string('dpa_telp')->nullable();
         // $table->date('last_docking')->nullable();
         // $table->string('last_docking_loc')->nullable();
         // $table->date('next_docking')->nullable();


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
      Schema::dropIfExists('vessels');
   }
}
