<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiftingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lifting_schedules', function (Blueprint $table) {
            $table->id();
            $table->integer('intermilan_id')->nullable();
            $table->integer('daily_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('barge_id')->nullable();
            $table->string('crude')->nullable();
            
            $table->string('vessel')->nullable();
            $table->string('destination')->nullable();
            $table->string('volume_nominasi')->nullable();
            $table->string('volume_actual')->nullable();
            $table->string('volume_lifting_ppl')->nullable();
            $table->string('volume_lifting_nonppl')->nullable();
            $table->date('ald_start')->nullable();
            $table->date('ald_end')->nullable();
            $table->date('complete_date')->nullable();
            $table->string('bl_no')->nullable();
            $table->text('remark')->nullable();

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
        Schema::dropIfExists('lifting_schedules');
    }
}
