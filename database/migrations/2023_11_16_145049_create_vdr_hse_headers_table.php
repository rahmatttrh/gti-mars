<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrHseHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_hse_headers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('description');
            $table->string('group_header');
            $table->string('io', 1);
            $table->unsignedBigInteger('vdr_id');
            $table->string('is_header', 1)->default('1');
            $table->tinyInteger('header_id')->nullable();
            $table->string('status', 3)->default('1');
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
        Schema::dropIfExists('vdr_hse_headers');
    }
}
