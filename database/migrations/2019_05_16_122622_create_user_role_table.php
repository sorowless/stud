<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_role', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->timestamps();
        });
        //Schema::table('user_role', function(Blueprint $table) {
        //    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        //});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::table('user_role', function (Blueprint $table) {
        //    $table->dropForeign(['user_id']);
        //    $table->dropForeign(['role_id']);
        //});
        Schema::dropIfExists('user_role');
    }
}
