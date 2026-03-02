<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrOperatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_operatings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vdr_id');
            $table->tinyInteger('heading_id');
            $table->decimal('time', 4, 2)->default(0.00);
            $table->decimal('speed', 4, 2)->nullable();
            $table->smallInteger('contractual_fuel')->nullable();
            $table->decimal('daily', 5, 2)->nullable();
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
        Schema::dropIfExists('vdr_operatings');
    }
}
