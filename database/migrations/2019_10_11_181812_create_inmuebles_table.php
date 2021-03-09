<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInmueblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inmuebles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo');
            $table->float('alicuota')->nullable();
            $table->integer('idprop')->unsigned();
            $table->integer('idcondominio')->unsigned();
            $table->foreign('idprop')->references('id')->on('propietarios')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('inmuebles');
    }
}
