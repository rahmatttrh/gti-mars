<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrOperatingHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_operating_headers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('description', 100);
            $table->string('unit', 50)->nullable();
            $table->string('field', 50)->nullable();
            $table->string('speed', 1)->default(0);
            $table->string('contractual', 1)->default(1);
            $table->string('daily', 1)->default(1);
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
        Schema::dropIfExists('vdr_operating_headers');
    }
}
