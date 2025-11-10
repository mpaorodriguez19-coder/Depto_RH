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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();

            // Datos personales básicos
            $table->string('codigo_empleado')->nullable()->unique();
            $table->string('primer_nombre')->nullable();
            $table->string('segundo_nombre')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('sexo', ['F','M'])->nullable();

            // Documentos
            $table->string('dni')->nullable()->unique();
            $table->string('rtn')->nullable();

            // Datos de contacto y domicilio
            $table->string('nacionalidad')->nullable();
            $table->string('tipo_sangre')->nullable();
            $table->text('direccion')->nullable();
            $table->string('referencia_domicilio')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono_fijo')->nullable();

            // Educacion
            $table->string('nivel_educativo')->nullable();
            $table->string('titulo_obtenido')->nullable();

            // Estado civil
            $table->string('estado_civil')->nullable();

            // Foto (ruta)
            $table->string('foto_path')->nullable();

            // Contactos de emergencia (simple: campos individuales)
            $table->string('contacto1_nombre')->nullable();
            $table->string('contacto1_telefono')->nullable();
            $table->string('contacto1_parentesco')->nullable();

            $table->string('contacto2_nombre')->nullable();
            $table->string('contacto2_telefono')->nullable();
            $table->string('contacto2_parentesco')->nullable();

            // Beneficiarios (guardamos JSON para flexibilidad: name, porcentaje, parentesco, dni)
            $table->json('beneficiarios')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
