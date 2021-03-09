<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlquilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquilers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo');
            $table->string('detalle')->nullable();
            $table->float('monto')->nullable();
            $table->float('saldo')->nullable();
            $table->date('fecha')->nullable();
            $table->integer('idcontrato')->unsigned();
            $table->integer('idinmueble')->unsigned();
            $table->foreign('idcontrato')->references('id')->on('contratos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idinmueble')->references('id')->on('inmuebles')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('alquilers');
    }
}
