<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('searchs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->integer('user_id')->unsigned();
            $table->integer('keyword_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('keyword_id')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('searchs');
    }
}
