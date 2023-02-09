<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->string('imagen');
            $table->date("fechaInicio");
            $table->date("fechaFin");

// llaves foraneas con departmaento y ciudad
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('ciudad_id');

            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');

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
        Schema::dropIfExists('eventos');
    }
};
