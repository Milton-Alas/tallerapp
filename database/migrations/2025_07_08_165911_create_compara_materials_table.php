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
        Schema::create('compara_materials', function (Blueprint $table) {
            $table->id();
            $table->foreingId('material_id')->constrained('materials')->OnDelete('cascade');
            $total->decimal('cantidad', 8,2);
            $table->integer('costo_total', 10,2);
            $table->date('fecha');
            $table->text('comentario')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compara_materials');
    }
};
