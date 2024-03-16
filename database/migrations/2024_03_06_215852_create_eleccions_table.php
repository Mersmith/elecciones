<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eleccions', function (Blueprint $table) {
            $table->id();

            $table->string('nombre')->unique();
            $table->string('slug')->unique();
            $table->dateTime('fecha_inicio_convocatoria');
            $table->dateTime('fecha_fin_convocatoria');
            $table->dateTime('fecha_inicio_elecciones');
            $table->dateTime('fecha_fin_elecciones');
            $table->string('imagen_ruta')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eleccions');
    }
};
