<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnsDiligencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turns_diligences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('turn_id');
            $table->integer('diligence_id');
            $table->dateTime('time_atention');
            $table->dateTime('end_atention');

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
        Schema::dropIfExists('turns_diligences');
    }
}
