<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiligencesModulesTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diligences_modules_turns', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('diligence_id')
                ->unsigned();

            $table->foreign('diligence_id')
                ->references('id')
                ->on('diligences')
                ->onDelete('cascade');

            $table->integer('module_id')
                ->unsigned();

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
                ->onDelete('cascade');

            $table->integer('turn_id')
                ->unsigned();

            $table->foreign('turn_id')
                ->references('id')
                ->on('turns')
                ->onDelete('cascade');

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
        Schema::dropIfExists('diligences_modules_turns');
    }
}
