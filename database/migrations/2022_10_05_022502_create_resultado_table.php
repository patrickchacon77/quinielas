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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->integer('goles_equipo1')->nullable();
            $table->integer('goles_equipo2')->nullable();
            $table->integer('puntos_apostados')->nullable();
            $table->string('resultado')->nullable();
            $table->timestamps();
            $table->foreignId('user_torneo_id')->constrained('user_torneo');
            $table->foreignId('partido_id')->constrained('partidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultado');
    }
};
