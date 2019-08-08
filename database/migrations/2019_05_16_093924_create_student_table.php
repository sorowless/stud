<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable()->unsigned();
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('fio');
            $table->integer('class_id')->nullable()->unsigned();
            //$table->foreign('class_id')->references('id')->on('class')->onDelete('cascade');
            $table->enum('gender',['male','female']);
            $table->string('email');
            $table->string('photo');
            $table->date('birthday');
            $table->string('phone');
            $table->string('parent_phone');
            $table->date('receipt_date');
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
        //Schema::table('student', function (Blueprint $table) {
        //    $table->dropForeign(['user_id']);
        //    $table->dropForeign(['class_id']);
        //});
        Schema::dropIfExists('students');
    }
}
