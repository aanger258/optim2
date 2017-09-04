<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexesForUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
             $table->foreign('group_id')->references('id')->on('user_groups');
        });

        Schema::table('group_roles', function (Blueprint $table) {
             $table->foreign('group_id')->references('id')->on('user_groups');
             $table->foreign('role_id')->references('id')->on('roles');
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
            $table->dropForeign(['group_id']);
        });

        Schema::table('group_roles', function (Blueprint $table) {
             $table->dropForeign(['group_id']);
             $table->dropForeign(['role_id']);
        });
    }
}
