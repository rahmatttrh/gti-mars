<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vdr_id');
            $table->text('activity');
            $table->time('start');
            $table->time('finish');
            $table->time('high')->nullable();
            $table->time('normal')->nullable();
            $table->time('slow')->nullable();
            $table->time('manu')->nullable();
            $table->time('idle')->nullable();
            $table->time('tow')->nullable();
            $table->time('ah')->nullable();
            $table->time('sb')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('vdr_activities');
    }
}
