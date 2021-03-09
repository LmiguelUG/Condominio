<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('status');
            $table->integer('idinmueble')->unsigned();
            $table->integer('idinquilino')->unsigned();
            $table->date('desde')->nullable();
            $table->date('hasta')->nullable();
            $table->foreign('idinmueble')->references('id')->on('inmuebles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idinquilino')->references('id')->on('inquilinos')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contratos');
    }
}
