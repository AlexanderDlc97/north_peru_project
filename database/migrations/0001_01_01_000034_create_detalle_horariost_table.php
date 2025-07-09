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
        Schema::create('detalle_horariost', function (Blueprint $table) {
            $table->id();
            $table->string('fecha_registro');
            $table->string('horario_registro');
            $table->unsignedBigInteger('operaciones_polifuncionale_id')->nullable();
            $table->foreign('operaciones_polifuncionale_id')->references('id')->on('operaciones_polifuncionales')->cascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_horariost');
    }
};
