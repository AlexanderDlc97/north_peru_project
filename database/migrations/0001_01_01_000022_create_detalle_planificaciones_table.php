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
        Schema::create('detalle_planificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('producto_id');
            $table->string('codigo');
            $table->string('producto');
            $table->string('umedida');
            $table->string('cantidad');
            $table->unsignedBigInteger('planificacion_id');
            $table->foreign('planificacion_id')->references('id')->on('planificaciones')->cascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_planificaciones');
    }
};
