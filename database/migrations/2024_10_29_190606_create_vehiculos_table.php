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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('placa_vehiculo')->unique();
            $table->foreignId('marca_id')->constrained('marcas');
            $table->integer('modelo_vehiculo');
            $table->string('color_vehiculo');
            $table->string('propietario_vehiculo');
            $table->integer('estado_vehiculo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
