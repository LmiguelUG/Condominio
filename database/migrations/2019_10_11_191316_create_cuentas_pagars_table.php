<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasPagarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_pagars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idpropietario')->unsigned();
            $table->integer('idcontrato')->unsigned();
            $table->integer('idalquiler')->unsigned();
            $table->foreign('idpropietario')->references('id')->on('propietarios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idcontrato')->references('id')->on('contratos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idalquiler')->references('id')->on('alquilers')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cuentas_pagars');
    }
}
