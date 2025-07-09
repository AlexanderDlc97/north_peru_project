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
        Schema::create('programaciones', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('responsable');
            $table->string('fecha_emision');
            $table->string('categoria_id');
            $table->string('categoria');
            $table->string('rubro');
            $table->string('descripcion_orden')->nullable();
            $table->string('descripcion_labor')->nullable();
            $table->string('estado')->default('Inactivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programaciones');
    }
};
