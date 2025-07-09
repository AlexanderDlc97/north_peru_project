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
        Schema::create('ot_requeridos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('responsable');
            $table->string('fecha_emision');
            $table->string('departamento_id');
            $table->string('equipo');
            $table->string('porcentaje');
            $table->string('categoria_id');
            $table->string('categoria');
            $table->string('rubro');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('mes_fin');
            $table->string('nivel_importancia');
            $table->string('descripcion_orden')->nullable();
            $table->string('descripcion_labor')->nullable();
            $table->string('supervisor_general');
            $table->string('telefono');
            $table->string('conformidad');
            $table->string('comentarios')->nullable();
            $table->string('operario_funcional');
            $table->string('supervisor_contratista');
            $table->string('tecnico_especialista');
            $table->string('encargado_spcc');
            $table->string('n_vale_compra');
            $table->string('estado')->default('Por Atender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ot_requeridos');
    }
};
