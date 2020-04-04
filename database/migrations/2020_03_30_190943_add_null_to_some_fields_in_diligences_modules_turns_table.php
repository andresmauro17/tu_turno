<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullToSomeFieldsInDiligencesModulesTurnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diligences_modules_turns', function (Blueprint $table) {
            
            $table->integer('module_id')
                ->unsigned()
                ->nullable()
                ->change();

            $table->dateTime('time_atention')
                ->nullable()
                ->change();

            $table->dateTime('end_atention')
                ->nullable()
                ->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diligences_modules_turns', function (Blueprint $table) {
            //
        });
    }
}
