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
        Schema::create('detalleo_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('producto_id');
            $table->string('codigo');
            $table->string('producto');
            $table->string('tipo_producto');
            $table->string('umedida');
            $table->string('cantidad');
            $table->string('cantidad_devuelta')->nullable();
            $table->string('cantidad_utilizada')->nullable();
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
        Schema::dropIfExists('detalleo_trabajos');
    }
};
