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
        Schema::create('detalledvo_trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('producto_id')->nullable();
            $table->string('codigo')->nullable();
            $table->string('producto');
            $table->string('umedida');
            $table->string('cantidad');
            $table->string('condicion')->nullable();
            $table->string('V_B_SPCC')->nullable();
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