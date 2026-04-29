{{-- resources/views/paiements/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Historique des paiements - FatoraPay')

@section('content')
<div class="max-w-lg mx-auto px-4 pb-28 md:max-w-2xl">

    {{-- Header --}}
    <header class="flex justify-between items-center py-4 mb-6">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">F</div>
            <span class="text-xl font-bold text-primary-600">FatoraPay</span>
        </div>
        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-200">
            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=2563EB&color=fff' }}" 
                 alt="Profil" class="w-full h-full object-cover">
        </div>
    </header>

    {{-- Titre --}}
    <div class="mb-6">
        <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Gestion Financière</span>
        <h1 class="text-3xl font-bold text-slate-900 mt-1">Historique des paiements</h1>
    </div>

    {{-- Boutons filtres --}}
    <div class="flex gap-3 mb-6">
        <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-medium text-slate-600 hover:bg-slate-50 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
            </svg>
            Filtrer
        </button>
        <button class="flex items-center gap-2 px-4 py-2.5 bg-primary-600 hover:bg-primary-700 text-white rounded-xl text-sm font-medium transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Rapport Annuel
        </button>
    </div>

    {{-- Total payé 2024 --}}
    <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100 mb-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-[11px] font-semibold text-emerald-600 uppercase tracking-wider bg-emerald-50 px-3 py-1 rounded-full">Total payé (2024)</span>
            <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
            </svg>
        </div>
        <div class="text-4xl font-bold text-primary-700 mb-1">
            {{ number_format($totalPaye2024, 2, ',', '.') }} €
        </div>
        <p class="text-sm text-slate-500">{{ $nbTransactions }} transactions effectuées avec succès.</p>
    </div>

    {{-- Prochaine facture --}}
    @if($prochaineFacture)
    <div class="bg-primary-600 rounded-2xl p-6 mb-6 text-white">
        <span class="inline-block text-[11px] font-semibold uppercase tracking-wider bg-white/20 px-3 py-1 rounded-full mb-3">Prochaine facture</span>
        <div class="text-3xl font-bold mb-1">
            {{ number_format($prochaineFacture->montant, 2, ',', '.') }} €
        </div>
        <p class="text-primary-100 text-sm mb-4">
            {{ $prochaineFacture->contrat?->type_label ?? 'Contrat' }} - Due le {{ $prochaineFacture->date_echeance->format('d F') }}
        </p>
        <button class="w-full py-3 bg-white text-primary-700 rounded-xl font-semibold text-sm hover:bg-primary-50 transition-colors">
            Payer maintenant
        </button>
    </div>
    @endif

    {{-- Transactions récentes --}}
    <div class="mb-4">
        <h2 class="text-lg font-semibold text-slate-900 mb-4">Transactions récentes</h2>
        
        <div class="flex flex-col gap-4">
            @forelse($transactions as $transaction)
                <x-transaction-card :transaction="$transaction" />
            @empty
                <div class="text-center py-12">
                    <div class="text-5xl mb-4">💳</div>
                    <h3 class="text-lg font-semibold text-slate-900 mb-2">Aucune transaction</h3>
                    <p class="text-slate-500">Vous n'avez pas encore effectué de paiement.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Charger plus --}}
    @if($transactions->count() >= 10)
    <button class="w-full py-3 text-sm font-medium text-slate-600 hover:text-slate-900 transition-colors flex items-center justify-center gap-2">
        Charger les transactions précédentes
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    @endif

    {{-- Bottom Navigation --}}
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-slate-200 flex justify-around py-2 z-50 md:max-w-lg md:mx-auto md:left-1/2 md:-translate-x-1/2">
        <a href="{{ route('home') }}" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span>Accueil</span>
        </a>
        <a href="{{ route('contrats.index') }}" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span>Contrats</span>
        </a>
        <a href="{{ route('paiements.index') }}" class="bottom-nav-item actif">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/>
            </svg>
            <span>Factures</span>
        </a>
        <a href="#" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span>Profil</span>
        </a>
    </nav>

</div>
@endsection