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
        Schema::create('pratos', function (Blueprint $table) {
            $table->id();
            $table->string("nome"); // nome do prato 
            $table->string("ingredientes");
            $table->timestamps();
            $table->foreignId("restaurante_id") -> constrained("restaurantes");

        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('pratos');
    }
};
