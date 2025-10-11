<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Crear la tabla 'pases'.
     */
    public function up(): void
    {
        Schema::create('pases', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empleado', 100);
            $table->string('numero_empleado', 20);
            $table->string('departamento', 100);
            $table->date('fecha');
            $table->enum('asunto', ['Personal', 'Laboral']);
            $table->string('razon_laboral', 255)->nullable();
            $table->time('hora_salida');
            $table->time('hora_entrada');
            $table->string('tiempo_tomado', 50);
            $table->timestamps();
        });
    }

    /**
     * Eliminar la tabla si existe.
     */
    public function down(): void
    {
        Schema::dropIfExists('pases');
    }
};


