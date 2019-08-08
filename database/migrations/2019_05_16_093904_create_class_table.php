<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('cteacher')->nullable()->unsigned();
            //$table->foreign('cteacher')->references('id')->on('teacher')->onDelete('cascade');
            $table->date('dataV')->nullable();
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
       // Schema::table('class', function (Blueprint $table) {
        //    $table->dropForeign(['cteacher']);
       // });
        Schema::dropIfExists('classes');
    }
}
