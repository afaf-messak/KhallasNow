{{-- resources/views/components/contrat-card.blade.php --}}
@props(['contrat'])

<div class="contrat-card">
    {{-- Header avec icône et statut --}}
    <div class="flex justify-between items-start mb-4">
        <div class="w-12 h-12 rounded-xl flex items-center justify-center text-2xl {{ $contrat->couleur_class }}">
            {{ $contrat->icone }}
        </div>
        
        @if($contrat->statut === 'actif')
            <span class="badge-statut {{ $contrat->statut_class }}">ACTIF</span>
        @elseif($contrat->statut === 'en_verification')
            <span class="badge-statut {{ $contrat->statut_class }}">Vérification...</span>
        @endif
    </div>

    {{-- Corps --}}
    <div class="mb-4">
        <h3 class="text-lg font-semibold text-slate-900 mb-0.5">{{ $contrat->titre }}</h3>
        <p class="text-xs text-slate-400 mb-3">N° CONTRAT : {{ $contrat->numero_contrat }}</p>

        {{-- Adresse --}}
        <div class="flex items-start gap-2 text-sm text-slate-500 mb-4">
            <svg class="w-4 h-4 mt-0.5 text-primary-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <div>
                <span>{{ $contrat->adresse }}</span>
                @if($contrat->ville)
                    <br>
                    <span class="font-medium text-slate-700">{{ $contrat->code_postal }} {{ $contrat->ville }}</span>
                @endif
            </div>
        </div>

        {{-- Dernière facture (si présente) --}}
        @if($contrat->dernier_montant_facture)
            <div class="bg-slate-50 rounded-xl p-3">
                <span class="block text-[10px] font-semibold text-slate-400 uppercase tracking-wider mb-1">Dernière facture</span>
                <div class="flex items-baseline gap-2">
                    <span class="text-2xl font-bold text-slate-900">{{ number_format($contrat->dernier_montant_facture, 2, ',', ' ') }} €</span>
                    <span class="text-sm text-slate-400">le {{ $contrat->date_derniere_facture?->format('d/m') }}</span>
                </div>
            </div>
        @endif
    </div>

    {{-- Footer --}}
    <div class="flex justify-between items-center pt-3 border-t border-slate-100">
        <a href="{{ route('contrats.show', $contrat) }}" class="flex items-center gap-1 text-sm font-medium text-primary-600 hover:text-primary-700">
            Détails techniques
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
        
        <div class="flex gap-2">
            <button class="w-8 h-8 rounded-lg border border-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                </svg>
            </button>
            <button class="w-8 h-8 rounded-lg border border-slate-200 flex items-center justify-center text-slate-400 hover:text-slate-600 hover:bg-slate-50 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Meta info spécifique au type --}}
    @if($contrat->type === 'eau' && isset($contrat->meta_donnees['consommation']))
        <div class="flex justify-between items-center mt-4 pt-3 border-t border-slate-100">
            <span class="text-sm text-slate-500">Consommation</span>
            <span class="text-sm font-semibold {{ $contrat->meta_donnees['consommation'] === 'optimal' ? 'text-emerald-600' : 'text-slate-700' }}">
                {{ ucfirst($contrat->meta_donnees['consommation']) }}
            </span>
        </div>
        <a href="{{ route('contrats.show', $contrat) }}" class="flex justify-between items-center py-3 mt-2 text-sm font-medium text-slate-700 hover:text-primary-600 transition-colors">
            Gérer le contrat
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    @endif

    @if($contrat->type === 'fibre_optique')
        <div class="flex justify-between items-center mt-4 pt-3 border-t border-slate-100">
            <span class="text-sm text-slate-500">Statut</span>
            <span class="text-sm font-semibold text-amber-600">Vérification...</span>
        </div>
        <a href="{{ route('contrats.show', $contrat) }}" class="flex justify-between items-center py-3 mt-2 text-sm font-medium text-slate-700 hover:text-primary-600 transition-colors">
            Gérer le contrat
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
        </a>
    @endif
</div>