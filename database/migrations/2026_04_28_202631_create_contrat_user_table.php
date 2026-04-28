<?php
// database/migrations/2024_01_01_000003_create_contrat_user_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contrat_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('contrat_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['proprietaire', 'co_titulaire', 'mandataire'])->default('proprietaire');
            $table->timestamps();
            
            $table->unique(['user_id', 'contrat_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contrat_user');
    }
};