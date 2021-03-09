<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasCobrarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_cobrars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('idinquilino')->unsigned();
            $table->integer('idcontrato')->unsigned();
            $table->integer('idalquiler')->unsigned();
            $table->foreign('idinquilino')->references('id')->on('inquilinos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('cuentas_cobrars');
    }
}
