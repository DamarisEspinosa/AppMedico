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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('email', 100);
            $table->string('telefono', 15);
            $table->date('fechaNacimiento');
            $table->decimal('altura', 5, 2)->nullable();
            $table->decimal('peso', 5, 2)->nullable();
            $table->enum('genero', ['Femenino', 'Masculino', 'Prefiero no especificar'])->default('Prefiero no especificar');
            $table->string('alergias');
            $table->unsignedBigInteger('id_secretaria'); // para saber quien registró al paciente 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
