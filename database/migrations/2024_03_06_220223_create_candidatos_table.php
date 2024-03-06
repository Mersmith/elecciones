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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('eleccion_id');
            $table->unsignedBigInteger('socio_id');

            $table->timestamps();

            $table->foreign('eleccion_id')->references('id')->on('eleccions')->onDelete('cascade');
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');
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
