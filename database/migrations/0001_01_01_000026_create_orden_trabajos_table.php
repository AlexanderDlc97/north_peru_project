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
        Schema::create('orden_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('slug');
            $table->string('responsable');
            $table->string('fecha_emision');
            $table->string('departamento_id');
            $table->string('ubicacion_tecnica');
            $table->string('equipo');
            $table->string('centro_costo');
            $table->string('porcentaje');
            $table->string('rubro');
            $table->string('categoria_id');
            $table->string('categoria');
            $table->string('fecha_inicio');
            $table->string('fecha_fin');
            $table->string('mes_fin');
            $table->string('nivel_importancia');
            $table->string('descripcion_orden')->nullable();
            $table->string('descripcion_labor')->nullable();
            $table->string('beneficiario')->nullable();
            $table->string('telefono');
            $table->string('conformidad');
            $table->string('comentarios')->nullable();
            $table->string('almacen_contratista')->nullable();
            $table->string('sup_pla_cont')->nullable();
            $table->string('fecha_sup_pla_cont')->nullable();
            $table->string('tec_esp_spcc_supervisor')->nullable();
            $table->string('tec_esp_spcc_planeamiento')->nullable();
            $table->string('fecha_cierre_ot')->nullable();
            $table->string('observaciones_cierre_ot')->nullable();
            $table->string('tipo_operacion')->nullable();
            $table->string('estado')->default('PENDIENTE');
            $table->string('sectore_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_trabajos');
    }
};
