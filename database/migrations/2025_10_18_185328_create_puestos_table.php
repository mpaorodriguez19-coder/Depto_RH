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
    Schema::create('puestos', function (Blueprint $table) {
        $table->id(); // ID autoincremental (llave primaria)
        $table->string('nombre'); // Nombre del puesto
        $table->text('descripcion')->nullable(); // Descripción general del puesto
        $table->text('funciones')->nullable(); // Funciones o responsabilidades
        $table->timestamps(); // Campos created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puestos');
    }
};
