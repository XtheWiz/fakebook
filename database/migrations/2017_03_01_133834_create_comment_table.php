<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ownerPost')->unsigned();
            $table->integer('ownerUser')->unsigned();
            $table->string('body');
            $table->integer('likes')->unsigned()->default(0);
            $table->timestamps();

            $table->foreign('ownerUser')->references('id')->on('users');
            $table->foreign('ownerPost')->references('id')->on('Post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Comment');
    }
}
