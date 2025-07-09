<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nullable();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->string('imagen')->nullable();
            $table->longText('descripcion')->nullable();
            $table->string('vida_util')->nullable();
            $table->string('depreciacion')->nullable();
            $table->string('costo')->nullable();
            $table->string('estado')->nullable();
            $table->string('registrado_por')->nullable();
            $table->unsignedBigInteger('marca_id')->nullable();
            $table->foreign('marca_id')->references('id')->on('marcas');
            $table->unsignedBigInteger('tipo_id')->nullable();
            $table->foreign('tipo_id')->references('id')->on('tipos');
            $table->unsignedBigInteger('medida_id')->nullable();
            $table->foreign('medida_id')->references('id')->on('medidas');
            $table->unsignedBigInteger('ubigeo_id')->nullable();
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
