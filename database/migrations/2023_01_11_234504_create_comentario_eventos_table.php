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
        Schema::create('comentario_eventos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->on('users')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('evento_id');
            $table->foreign('evento_id')->on('eventos')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('comentario');
            $table->date('fechaCreacion');
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
        Schema::dropIfExists('comentario_eventos');
    }
};
