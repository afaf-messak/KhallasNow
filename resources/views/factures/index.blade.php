{{-- resources/views/factures/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Vos Factures - KhallasNow')

@section('content')
<div class="max-w-lg mx-auto px-4 pb-28 md:max-w-2xl">

    {{-- Header --}}
    <header class="flex justify-between items-center py-4 mb-6">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white text-sm font-bold">F</div>
            <span class="text-xl font-bold text-primary-600">KhallasNow</span>
        </div>
        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-200">
            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=2563EB&color=fff' }}" 
                 alt="Profil" class="w-full h-full object-cover">
        </div>
    </header>

    {{-- Titre --}}
    <div class="mb-5">
        <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Gestion Financière</span>
        <h1 class="text-3xl font-bold text-slate-900 mt-1">Vos Factures</h1>
    </div>

    {{-- Filtre par type --}}
    <div class="mb-6">
        <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-3 block">Filtrer par type</span>
        <div class="flex gap-2.5 overflow-x-auto pb-2 scrollbar-hide">
            <a href="{{ route('factures.index', ['type' => 'eau', 'status' => $statusFilter]) }}" 
               class="flex items-center gap-2 px-4 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all border
               {{ $typeFilter === 'eau' ? 'bg-emerald-50 border-emerald-200 text-emerald-700' : 'bg-white border-slate-200 text-slate-500 hover:border-emerald-300' }}">
                <span class="w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center text-xs">💧</span>
                Eau
            </a>
            <a href="{{ route('factures.index', ['type' => 'electricite', 'status' => $statusFilter]) }}" 
               class="flex items-center gap-2 px-4 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all border
               {{ $typeFilter === 'electricite' ? 'bg-amber-50 border-amber-200 text-amber-700' : 'bg-white border-slate-200 text-slate-500 hover:border-amber-300' }}">
                <span class="w-6 h-6 rounded-full bg-amber-100 flex items-center justify-center text-xs">⚡</span>
                Électricité
            </a>
            <a href="{{ route('factures.index', ['type' => 'fibre_optique', 'status' => $statusFilter]) }}" 
               class="flex items-center gap-2 px-4 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all border
               {{ $typeFilter === 'fibre_optique' ? 'bg-indigo-50 border-indigo-200 text-indigo-700' : 'bg-white border-slate-200 text-slate-500 hover:border-indigo-300' }}">
                <span class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center text-xs">🌐</span>
                Internet
            </a>
        </div>
    </div>

    {{-- Filtre par statut --}}
    <div class="mb-6">
        <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider mb-3 block">Statut du paiement</span>
        <div class="flex gap-2.5 overflow-x-auto pb-2 scrollbar-hide">
            <a href="{{ route('factures.index', ['type' => $typeFilter, 'status' => 'tous']) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all
               {{ $statusFilter === 'tous' ? 'bg-primary-600 text-white' : 'bg-white border border-slate-200 text-slate-500 hover:border-primary-600 hover:text-primary-600' }}">
                Toutes
            </a>
            <a href="{{ route('factures.index', ['type' => $typeFilter, 'status' => 'payee']) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all
               {{ $statusFilter === 'payee' ? 'bg-primary-600 text-white' : 'bg-white border border-slate-200 text-slate-500 hover:border-primary-600 hover:text-primary-600' }}">
                Payée
            </a>
            <a href="{{ route('factures.index', ['type' => $typeFilter, 'status' => 'en_attente']) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all
               {{ $statusFilter === 'en_attente' ? 'bg-primary-600 text-white' : 'bg-white border border-slate-200 text-slate-500 hover:border-primary-600 hover:text-primary-600' }}">
                Non payée
            </a>
            <a href="{{ route('factures.index', ['type' => $typeFilter, 'status' => 'en_retard']) }}" 
               class="px-5 py-2.5 rounded-full text-sm font-medium whitespace-nowrap transition-all
               {{ $statusFilter === 'en_retard' ? 'bg-primary-600 text-white' : 'bg-white border border-slate-200 text-slate-500 hover:border-primary-600 hover:text-primary-600' }}">
                En retard
            </a>
        </div>
    </div>

    {{-- Liste Factures --}}
    <div class="flex flex-col gap-4">
        @forelse($factures as $facture)
            <x-facture-card :facture="$facture" />
        @empty
            <div class="text-center py-12">
                <div class="text-5xl mb-4">🧾</div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">Aucune facture</h3>
                <p class="text-slate-500">Aucune facture ne correspond à vos critères.</p>
            </div>
        @endforelse
    </div>

    {{-- Optimisation dépenses --}}
    <div class="bg-primary-900 rounded-2xl p-6 mt-6 text-white">
        <h3 class="text-lg font-bold mb-2">Optimisez vos dépenses</h3>
        <p class="text-sm text-primary-100 mb-5 leading-relaxed">Utilisez notre analyseur intelligent pour réduire vos factures d'énergie de 15% par an.</p>
        <a href="#" class="inline-flex items-center gap-2 px-5 py-2.5 bg-white text-primary-900 rounded-lg text-sm font-semibold hover:bg-primary-50 transition-colors">
            Découvrir
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
            </svg>
        </a>
    </div>

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
        <a href="{{ route('factures.index') }}" class="bottom-nav-item actif">
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