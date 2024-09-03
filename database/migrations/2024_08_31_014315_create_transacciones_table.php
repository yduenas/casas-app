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
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['Casa', 'Departamento', 'Lote']);
            $table->date('fecha');
            $table->decimal('costo', 10, 2)->default(0);
            $table->integer('numero')->unique();
            $table->unsignedBigInteger('propiedad_id');
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('cliente_propiedad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('propiedad_id');
            $table->foreign('propiedad_id')->references('id')->on('propiedades')->onDelete('cascade');
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transacciones');
    }
};
