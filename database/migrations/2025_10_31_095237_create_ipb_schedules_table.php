<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIpbSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipb_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('intermilan_id')->nullable();
            $table->integer('daily_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('title')->nullable();
            $table->integer('vessel1')->nullable();
            $table->integer('vessel2')->nullable();
            $table->integer('vessel3')->nullable();
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
        Schema::dropIfExists('ipb_schedules');
    }
}
