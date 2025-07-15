<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_histories', function (Blueprint $table) {
            $table->id();
            
            $table->string('code');
            $table->integer('vdr_id');
            $table->date('date');
            $table->integer('crew_onduty');
            $table->integer('crew_max');
            $table->string('location_midnight');
            $table->integer('status');
            $table->string('contract');
            $table->date('contract_start');
            $table->date('contract_end');

            $table->string('area');
            $table->string('owner');
            $table->string('master');
            $table->string('ce');

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
        Schema::dropIfExists('vdr_histories');
    }
}
