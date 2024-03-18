<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('eleccion_id');
            $table->unsignedBigInteger('socio_id');

            $table->string('numero_candidato')->nullable();
            $table->integer('cantidad_votos')->default(0);

            $table->timestamps();

            $table->foreign('eleccion_id')->references('id')->on('eleccions')->onDelete('cascade');
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');

            $table->unique(['eleccion_id', 'socio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
