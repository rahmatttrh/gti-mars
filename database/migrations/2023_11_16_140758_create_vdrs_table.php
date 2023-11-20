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
            $table->unsignedSmallInteger('vessel_id');
            $table->date('date');
            $table->unsignedSmallInteger('crew_onduty');
            $table->unsignedSmallInteger('crew_max');
            $table->char('status', 3);
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
