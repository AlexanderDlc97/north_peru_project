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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('responsable');
            $table->string('fecha_emision');
            $table->string('motivo');
            $table->string('vale_compra')->nullable();
            $table->string('o_trabajo_entrada')->nullable();
            $table->string('o_trabajo_salida')->nullable();
            $table->string('tipo_movimiento');
            $table->string('contador_movimiento')->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
