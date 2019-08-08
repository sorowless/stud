<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('lesson_date');
            $table->integer('cab')->nullable()->unsigned();
            //$table->foreign('cab')->references('id')->on('cabs')->onDelete('cascade');
            $table->integer('teach')->nullable()->unsigned();
            //$table->foreign('teach')->references('id')->on('teacher')->onDelete('cascade');
            $table->integer('clas')->nullable()->unsigned();
            //$table->foreign('clas')->references('id')->on('class')->onDelete('cascade');
            $table->integer('subj')->nullable()->unsigned();
            //$table->foreign('subj')->references('id')->on('subject')->onDelete('cascade');
            $table->integer('lesn')->nullable()->unsigned();
            //$table->foreign('lesn')->references('id')->on('lesson')->onDelete('cascade');
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
        //Schema::table('timetable', function (Blueprint $table) {
        //    $table->dropForeign(['cab']);
        //    $table->dropForeign(['teach']);
        //   $table->dropForeign(['clas']);
        //    $table->dropForeign(['subj']);
        //    $table->dropForeign(['lesn']);
        //});
        Schema::dropIfExists('timetables');
    }
}
