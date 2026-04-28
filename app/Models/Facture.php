<?php
// app/Models/Facture.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = [
        'contrat_id', 'numero_facture', 'montant',
        'date_emission', 'date_echeance', 'statut',
    ];

    protected $casts = [
        'montant' => 'decimal:2',
        'date_emission' => 'date',
        'date_echeance' => 'date',
    ];

    public function contrat(): BelongsTo
    {
        return $this->belongsTo(Contrat::class);
    }

    public function getMontantFormateAttribute(): string
    {
        return number_format($this->montant, 2, ',', ' ') . ' €';
    }
}