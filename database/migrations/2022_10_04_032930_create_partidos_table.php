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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 100)->nullable();
            $table->enum('completado', [1,2])->default(1);
            $table->integer('goles_equipo1')->nullable();
            $table->integer('goles_equipo2')->nullable();
            $table->string('resultado')->nullable();
            $table->date('fecha_partido')->nullable();
            $table->foreignId('pais1_id')->constrained('paises');
            $table->foreignId('pais2_id')->constrained('paises');
            $table->foreignId('torneo_id')->constrained('torneos');
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
        Schema::dropIfExists('partidos');
    }
};
