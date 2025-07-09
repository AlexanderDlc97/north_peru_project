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
        Schema::create('detalle_progresos', function (Blueprint $table) {
            $table->id();
            $table->string('porcentaje');
            $table->string('estado');
            $table->string('fecha');
            $table->string('comentarios')->nullable();
            $table->string('user_id');
            $table->string('responsable');
            $table->unsignedBigInteger('orden_trabajo_id');
            $table->foreign('orden_trabajo_id')->references('id')->on('orden_trabajos')->cascade();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_progresos');
    }
};
