<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postCategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('post_id')->unsigned();
            //$table->foreign('post_id')->references('id')->on('post')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            //$table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       // Schema::table('postCategory', function (Blueprint $table) {
       //     $table->dropForeign('postCategory_post_id_foreign');
       //     $table->dropForeign('postCategory_category_id_foreign');
       // });
        Schema::dropIfExists('postCategory');
    }
}
