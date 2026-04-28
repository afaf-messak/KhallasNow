<?php
// database/migrations/2024_01_01_000002_create_factures_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contrat_id')->constrained()->onDelete('cascade');
            $table->string('numero_facture');
            $table->decimal('montant', 10, 2);
            $table->date('date_emission');
            $table->date('date_echeance');
            $table->enum('statut', ['payee', 'en_attente', 'en_retard'])->default('en_attente');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};