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
        Schema::create('torneo_pais', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('torneo_id')->constrained('torneos');
            $table->foreignId('pais_id')->constrained('paises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('torneo_pais');
    }
};
