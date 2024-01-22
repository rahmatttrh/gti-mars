<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdrs', function (Blueprint $table) {
            $table->integerIncrements('id');
            // $table->integer('status')->nullable();
            $table->string('code')->nullable();
            $table->unsignedSmallInteger('vessel_id');
            $table->date('date');
            $table->unsignedSmallInteger('crew_onduty')->default(0);
            $table->unsignedSmallInteger('crew_max')->default(0);
            $table->string('location_midnight')->nullable();
            $table->string('status', 3)->default('1');
            $table->string('created_by', 50);
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
        Schema::dropIfExists('vdrs');
    }
}
