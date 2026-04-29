{{-- resources/views/components/transaction-card.blade.php --}}
@props(['transaction'])

@php
    $icon = match($transaction->contrat?->type) {
        'electricite' => '⚡',
        'eau' => '💧',
        'fibre_optique' => '🌐',
        'gaz' => '🔥',
        default => '📄',
    };
    
    $iconBg = match($transaction->contrat?->type) {
        'electricite' => 'bg-amber-100 text-amber-600',
        'eau' => 'bg-blue-100 text-blue-600',
        'fibre_optique' => 'bg-indigo-100 text-indigo-600',
        'gaz' => 'bg-orange-100 text-orange-600',
        default => 'bg-slate-100 text-slate-600',
    };
@endphp

<div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100">
    {{-- Icône centrée --}}
    <div class="flex justify-center mb-3">
        <div class="w-12 h-12 rounded-2xl {{ $iconBg }} flex items-center justify-center text-2xl">
            {{ $icon }}
        </div>
    </div>

    {{-- Titre et badge --}}
    <div class="text-center mb-3">
        <div class="flex items-center justify-center gap-2 mb-1">
            <h3 class="text-base font-semibold text-slate-900">
                {{ $transaction->contrat?->type_label ?? 'Contrat' }} - Facture {{ $transaction->contrat?->type === 'eau' ? 'Trimestrielle' : 'Mensuel' }}
            </h3>
            <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold uppercase bg-emerald-50 text-emerald-600">Payé</span>
        </div>
        <p class="text-xs text-slate-400">
            ID: #{{ $transaction->numero_facture }} • {{ $transaction->date_emission->format('d F Y') }}
        </p>
    </div>

    {{-- Montant --}}
    <div class="text-center mb-3">
        <span class="text-2xl font-bold text-slate-900">
            {{ number_format($transaction->montant, 2, ',', '.') }} €
        </span>
    </div>

    {{-- Actions --}}
    <div class="flex items-center justify-center gap-4">
        <button class="flex items-center gap-1.5 text-xs font-semibold text-primary-600 hover:text-primary-700 uppercase tracking-wider">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
            </svg>
            Détails
        </button>
        <button class="flex items-center gap-1.5 text-xs font-semibold text-primary-600 hover:text-primary-700 uppercase tracking-wider">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Reçu
        </button>
    </div>
</div>