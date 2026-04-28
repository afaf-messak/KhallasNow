<?php
// app/Models/Contrat.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_contrat', 'type', 'titre', 'description', 'statut',
        'adresse', 'ville', 'code_postal', 'dernier_montant_facture',
        'date_derniere_facture', 'details_techniques', 'meta_donnees',
    ];

    protected $casts = [
        'dernier_montant_facture' => 'decimal:2',
        'date_derniere_facture' => 'date',
        'details_techniques' => 'array',
        'meta_donnees' => 'array',
    ];

    public const TYPE_ELECTRICITE = 'electricite';
    public const TYPE_EAU = 'eau';
    public const TYPE_FIBRE = 'fibre_optique';
    public const TYPE_GAZ = 'gaz';

    public const STATUT_ACTIF = 'actif';
    public const STATUT_VERIFICATION = 'en_verification';

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('role')
            ->withTimestamps();
    }

    public function factures(): HasMany
    {
        return $this->hasMany(Facture::class);
    }

    public function scopeForUser($query, int $userId)
    {
        return $query->whereHas('users', fn($q) => $q->where('users.id', $userId));
    }

    public function scopeParType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function getIconeAttribute(): string
    {
        return match($this->type) {
            self::TYPE_ELECTRICITE => '⚡',
            self::TYPE_EAU => '💧',
            self::TYPE_FIBRE => '🌐',
            self::TYPE_GAZ => '🔥',
            default => '📄',
        };
    }

    public function getCouleurClassAttribute(): string
    {
        return match($this->type) {
            self::TYPE_ELECTRICITE => 'bg-emerald-100 text-emerald-600',
            self::TYPE_EAU => 'bg-cyan-100 text-cyan-600',
            self::TYPE_FIBRE => 'bg-indigo-100 text-indigo-600',
            self::TYPE_GAZ => 'bg-amber-100 text-amber-600',
            default => 'bg-gray-100 text-gray-600',
        };
    }

    public function getTypeLabelAttribute(): string
    {
        return match($this->type) {
            self::TYPE_ELECTRICITE => 'Électricité',
            self::TYPE_EAU => 'Eau',
            self::TYPE_FIBRE => 'Fibre Optique',
            self::TYPE_GAZ => 'Gaz',
            default => 'Autre',
        };
    }

    public function getStatutClassAttribute(): string
    {
        return match($this->statut) {
            self::STATUT_ACTIF => 'bg-emerald-50 text-emerald-600',
            self::STATUT_VERIFICATION => 'bg-amber-50 text-amber-600',
            default => 'bg-slate-50 text-slate-600',
        };
    }
}