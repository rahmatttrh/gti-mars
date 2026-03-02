<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVdrEnginesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vdr_engines', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('vdr_id');
            $table->tinyInteger('heading_id');
            $table->integer('m_ref')->default(0);
            $table->integer('m_port')->default(0);
            $table->integer('m_stbd')->default(0);
            $table->integer('m_center')->default(0);
            $table->integer('m_other')->default(0);
            $table->integer('a_ref')->default(0);
            $table->integer('a_port')->default(0);
            $table->integer('a_stbd')->default(0);
            $table->integer('a_other')->default(0);
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
        Schema::dropIfExists('vdr_engines');
    }
}
