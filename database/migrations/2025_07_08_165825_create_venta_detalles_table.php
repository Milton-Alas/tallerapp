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
        Schema::create('venta_detalles', function (Blueprint $table) {
            $table->id();
            //descomentar para relacion con users
            //$table->foreignId('user_id')->constrained('users');
            $table->foreignId('venta_id')->constrained('ventas')->OnDelete('cascade');
            $table->foreignId('producto_id')->constrained('productos')->OnDelete('cascade');
            $table->integer('cantidad');
            $table->decimal('precio', 10, 2);
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venta_detalles');
    }
};
