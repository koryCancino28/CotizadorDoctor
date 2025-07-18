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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('cmp')->nullable()->unique();
            $table->enum('tipo_delivery', ['Recojo en tienda', 'Entrega a domicilio'])->nullable();
            $table->string('telefono')->nullable(); 
            $table->text('direccion')->nullable();
            $table->foreignId('visitadora_id')->constrained('users')->onDelete('cascade'); //relación con users para obtener la visitadora asociada a cada medico
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con users
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
