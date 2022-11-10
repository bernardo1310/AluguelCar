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
        Schema::create('aluguels', function (Blueprint $table) {
            $table->unsignedBigInteger('idContato');
            $table->unsignedBigInteger('idCarro');

            $table->id();
            $table->foreign('idContato')->references('id')->on('contatos');
            $table->foreign('idCarro')->references('id')->on('carros');
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
        Schema::dropIfExists('aluguels');
    }
};
