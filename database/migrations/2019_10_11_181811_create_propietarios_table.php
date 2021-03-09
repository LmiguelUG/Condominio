<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropietariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propietarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idcondominio')->unsigned();
            $table->string('nombre')->nullable();
            $table->string('telefono')->nullable();
            $table->foreign('idcondominio')->references('id')->on('condominios')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('propietarios');
    }
}
