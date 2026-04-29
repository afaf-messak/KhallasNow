<?php

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

    public function getStatutClassAttribute(): string
    {
        return match($this->statut) {
            'payee' => 'bg-emerald-50 text-emerald-600',
            'en_retard' => 'bg-red-50 text-red-600',
            default => 'bg-slate-100 text-slate-500',
        };
    }

    public function getStatutLabelAttribute(): string
    {
        return match($this->statut) {
            'payee' => 'Payée',
            'en_retard' => 'En retard',
            default => 'Non payée',
        };
    }

    public function getTypeIconAttribute(): string
    {
        return match($this->contrat?->type) {
            'electricite' => '⚡',
            'eau' => '💧',
            'fibre_optique' => '🌐',
            'gaz' => '🔥',
            default => '📄',
        };
    }

    public function getTypeColorClassAttribute(): string
    {
        return match($this->contrat?->type) {
            'electricite' => 'bg-amber-100 text-amber-600',
            'eau' => 'bg-emerald-100 text-emerald-600',
            'fibre_optique' => 'bg-indigo-100 text-indigo-600',
            'gaz' => 'bg-orange-100 text-orange-600',
            default => 'bg-slate-100 text-slate-600',
        };
    }
}