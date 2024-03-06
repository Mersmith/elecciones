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
        Schema::create('socios', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('nombres');
            $table->string('codigo')->unique();
            $table->string('celular')->nullable();
            $table->string('rol')->default("socio");
            $table->string('dni')->unique();
            $table->enum('sexo', ['M', 'F'])->default('M');
            $table->date('fecha_nacimiento')->nullable();
            $table->integer('edad')->nullable();
            $table->enum('condicion', ['INHABILITADO', 'HABILITADO'])->default('INHABILITADO');
            $table->enum('grado', ['SUPERIOR', 'SECUNDARIO', 'PRIMARIA'])->default('PRIMARIA');
            $table->string('direccion')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('socios');
    }
};
