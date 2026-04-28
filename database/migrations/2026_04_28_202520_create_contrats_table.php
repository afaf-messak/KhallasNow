<?php
// database/migrations/2024_01_01_000001_create_contrats_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numero_contrat')->unique();
            $table->enum('type', ['electricite', 'eau', 'fibre_optique', 'gaz', 'telephonie']);
            $table->string('titre');
            $table->text('description')->nullable();
            $table->enum('statut', ['actif', 'inactif', 'en_verification', 'resilie'])->default('actif');
            $table->string('adresse');
            $table->string('ville')->nullable();
            $table->string('code_postal', 10)->nullable();
            $table->decimal('dernier_montant_facture', 10, 2)->nullable();
            $table->date('date_derniere_facture')->nullable();
            $table->json('details_techniques')->nullable();
            $table->json('meta_donnees')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};