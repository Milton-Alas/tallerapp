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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('color', ['Blanco', 'Negro', 'Otro']);
            $table->enum('talla', ['8', '10', '12','14', '16', 'S', 'M', 'L', 'XL', 'XXL']);
            $table->decimal('precio_docena', 10, 2);
            $table->text('comentario')->nullable();
            $table->unique('color', 'talla'); //para evitar duplicados
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
