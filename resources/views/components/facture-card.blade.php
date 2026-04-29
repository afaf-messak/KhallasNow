{{-- resources/views/components/facture-card.blade.php --}}
@props(['facture'])

@php
    $couleurClass = match($facture->contrat?->type) {
        'electricite' => 'bg-amber-100 text-amber-600',
        'eau' => 'bg-emerald-100 text-emerald-600',
        'fibre_optique' => 'bg-indigo-100 text-indigo-600',
        default => 'bg-slate-100 text-slate-600',
    };
    
    $icone = match($facture->contrat?->type) {
        'electricite' => '⚡',
        'eau' => '💧',
        'fibre_optique' => '🌐',
        default => '📄',
    };
@endphp

<div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100">
    {{-- Header --}}
    <div class="flex justify-between items-start mb-3">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl flex items-center justify-center text-lg {{ $couleurClass }}">
                {{ $icone }}
            </div>
            <div>
                <div class="flex items-center gap-2">
                    <h3 class="text-base font-semibold text-slate-900">{{ $facture->contrat?->type_label ?? 'Facture' }}</h3>
                    @if($facture->statut === 'en_retard')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold uppercase bg-red-50 text-red-600">En retard</span>
                    @elseif($facture->statut === 'payee')
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold uppercase bg-emerald-50 text-emerald-600">Payée</span>
                    @else
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold uppercase bg-slate-100 text-slate-500">Non payée</span>
                    @endif
                </div>
                <p class="text-xs text-slate-400">{{ $facture->contrat?->titre ?? '' }}</p>
                @if($facture->numero_facture)
                    <p class="text-xs text-slate-400">Facture n° {{ $facture->numero_facture }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- Montant --}}
    <div class="mb-3">
        <span class="text-3xl font-bold text-slate-900">{{ $facture->montant_formate }}</span>
        <p class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Émise le {{ $facture->date_emission->format('d F Y') }}</p>
    </div>

    {{-- Actions selon statut --}}
    @if($facture->statut === 'en_retard')
        <div class="flex items-center gap-3 mt-4">
            <div class="flex items-center gap-1 text-red-500 text-xs font-medium">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
                Dépassement de 14 jours
            </div>
            <button class="ml-auto px-5 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-sm font-semibold transition-colors">
                Régler maintenant
            </button>
        </div>
    @elseif($facture->statut === 'en_attente')
        <button class="w-full mt-4 py-3 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50 transition-colors">
            Payer maintenant
        </button>
    @elseif($facture->statut === 'payee')
        <div class="flex justify-between items-center mt-4 pt-3 border-t border-slate-100">
            <span class="text-xs text-slate-400">Réglé le {{ $facture->updated_at->format('d/m') }}</span>
            <a href="#" class="flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-700">
                Reçu
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
            </a>
        </div>
    @endif
</div>