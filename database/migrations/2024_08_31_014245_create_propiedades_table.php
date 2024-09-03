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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 35);
            $table->decimal('precio', 10, 2)->default(0);
            $table->enum('tipo', ['Venta', 'Anticretico', 'Alquiler']);
            $table->string('ubicacion', 250)->nullable();
            $table->string('superficie', 75)->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('propietario_id');
            $table->foreign('propietario_id')->references('id')->on('propietarios')->onDelete('cascade');
            $table->unsignedBigInteger('vendedor_id')->nullable();
            $table->foreign('vendedor_id')->references('id')->on('vendedores')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
