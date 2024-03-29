<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropForeign('users_module_id_foreign');
            $table->dropColumn('module_id');
        });

        Schema::table('modules', function (Blueprint $table) {

            $table->integer('user_id')
                ->unsigned()
                ->nullable();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('module_id')
                ->unsigned()
                ->nullable();

            $table->foreign('module_id')
                ->references('id')
                ->on('modules');
            
        });
        Schema::table('modules', function (Blueprint $table) {
            $table->dropForeign('modules_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
}
