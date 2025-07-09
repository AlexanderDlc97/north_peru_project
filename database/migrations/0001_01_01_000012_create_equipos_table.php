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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('name');
            $table->string('estado')->default('Inactivo');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('inmueble_id');
            $table->unsignedBigInteger('centro_costo_id');
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('inmueble_id')->references('id')->on('inmuebles');
            $table->foreign('centro_costo_id')->references('id')->on('centro_costos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
