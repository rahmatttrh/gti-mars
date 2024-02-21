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
            $table->time('finish')->nullable();
            $table->decimal('high', 4, 2);
            $table->decimal('normal', 4, 2);
            $table->decimal('slow', 4, 2);
            $table->decimal('manu', 4, 2);
            $table->decimal('idle', 4, 2);
            $table->decimal('tow', 4, 2);
            $table->decimal('ah', 4, 2);
            $table->decimal('sb', 4, 2);
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
