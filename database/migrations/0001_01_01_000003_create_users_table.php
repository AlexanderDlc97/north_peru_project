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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('lastname_apellidos')->nullable();
            $table->string('imagen')->nullable();
            $table->string('nro_contacto')->nullable();
            $table->string('tipo_documento')->nullable();
            $table->string('nro_documento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('confirmpassword')->nullable();
            $table->string('estado');
            $table->string('tipo_usuario')->nullable();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('sectore_id');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign('sectore_id')->references('id')->on('sectores');
            $table->foreign('ubigeo_id')->references('id')->on('ubigeos');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
