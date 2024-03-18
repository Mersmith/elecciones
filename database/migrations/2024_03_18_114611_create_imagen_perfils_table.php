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
        Schema::create('imagen_perfils', function (Blueprint $table) {
            $table->id();

            $table->string('imagen_perfil_ruta');
            $table->unsignedBigInteger('imagen_perfilable_id');
            $table->string('imagen_perfilable_type');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagen_perfils');
    }
};
