<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wos', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('party_id');
            $table->smallInteger('schedule_id');
            $table->tinyInteger('payloadtype_id');
            $table->string('activity')->nullable();
            $table->string('status', 3)->default('0');
            $table->dateTime('departure')->nullable();
            $table->dateTime('release_at')->nullable();
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
        Schema::dropIfExists('wos');
    }
}
