{{-- resources/views/contrats/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Mes Contrats - KhallasNow')

@section('content')
<div class="max-w-mobile mx-auto px-4 pb-24 md:max-w-2xl">

    {{-- Header --}}
    <header class="flex justify-between items-center py-4 mb-6">
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-primary-600 rounded-lg flex items-center justify-center text-white text-lg">📊</div>
            <span class="text-xl font-bold text-primary-600">KhallasNow</span>
        </div>
        <div class="w-10 h-10 rounded-full overflow-hidden border-2 border-slate-200">
            <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=3B82F6&color=fff' }}" 
                 alt="Profil" class="w-full h-full object-cover">
        </div>
    </header>

    {{-- Titre section --}}
    <div class="mb-5">
        <span class="text-[11px] font-semibold text-slate-400 uppercase tracking-wider">Gestion Patrimoine</span>
        <h1 class="text-3xl font-bold text-slate-900 mt-1">Mes Contrats</h1>
    </div>

    {{-- Bouton Nouveau Contrat --}}
    <a href="{{ route('contrats.create') }}" 
       class="flex items-center justify-center gap-2 w-full py-4 bg-primary-600 hover:bg-primary-700 text-white rounded-xl font-semibold text-base shadow-lg shadow-primary-500/30 transition-all active:scale-[0.98] mb-6">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        Nouveau Contrat
    </a>

    {{-- Filtres --}}
    <div class="flex gap-2.5 overflow-x-auto pb-2 mb-6 scrollbar-hide">
        <a href="{{ route('contrats.index', ['type' => 'tous']) }}" 
           class="filtre-btn {{ $filtreType === 'tous' ? 'actif' : '' }}">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            Tous
            @if($stats['total'] > 0)
                <span class="ml-1 text-[10px] px-1.5 py-0.5 rounded-full {{ $filtreType === 'tous' ? 'bg-white/20' : 'bg-slate-100' }}">{{ $stats['total'] }}</span>
            @endif
        </a>
        
        <a href="{{ route('contrats.index', ['type' => 'electricite']) }}" 
           class="filtre-btn {{ $filtreType === 'electricite' ? 'actif' : '' }}">
            <span class="text-sm">⚡</span>
            Électricité
            @if($stats['electricite'] > 0)
                <span class="ml-1 text-[10px] px-1.5 py-0.5 rounded-full {{ $filtreType === 'electricite' ? 'bg-white/20' : 'bg-slate-100' }}">{{ $stats['electricite'] }}</span>
            @endif
        </a>
        
        <a href="{{ route('contrats.index', ['type' => 'eau']) }}" 
           class="filtre-btn {{ $filtreType === 'eau' ? 'actif' : '' }}">
            <span class="text-sm">💧</span>
            Eau
            @if($stats['eau'] > 0)
                <span class="ml-1 text-[10px] px-1.5 py-0.5 rounded-full {{ $filtreType === 'eau' ? 'bg-white/20' : 'bg-slate-100' }}">{{ $stats['eau'] }}</span>
            @endif
        </a>
        
        <a href="{{ route('contrats.index', ['type' => 'fibre_optique']) }}" 
           class="filtre-btn {{ $filtreType === 'fibre_optique' ? 'actif' : '' }}">
            <span class="text-sm">🌐</span>
            Fibre
            @if($stats['fibre'] > 0)
                <span class="ml-1 text-[10px] px-1.5 py-0.5 rounded-full {{ $filtreType === 'fibre_optique' ? 'bg-white/20' : 'bg-slate-100' }}">{{ $stats['fibre'] }}</span>
            @endif
        </a>
    </div>

    {{-- Liste des contrats --}}
    <div class="flex flex-col gap-4">
        @forelse($contrats as $contrat)
            <x-contrat-card :contrat="$contrat" />
        @empty
            <div class="text-center py-12">
                <div class="text-5xl mb-4">📋</div>
                <h3 class="text-lg font-semibold text-slate-900 mb-2">Aucun contrat</h3>
                <p class="text-slate-500 mb-6">Vous n'avez pas encore de contrat enregistré.</p>
                <a href="{{ route('contrats.create') }}" class="text-primary-600 font-semibold hover:underline">Créer mon premier contrat</a>
            </div>
        @endforelse
    </div>

    {{-- Section Optimisation --}}
    @if($optimisation)
        <div class="bg-white rounded-2xl p-5 shadow-sm border border-slate-100 mt-6">
            <h3 class="text-base font-semibold text-slate-900 mb-2">{{ $optimisation['titre'] }}</h3>
            <p class="text-sm text-slate-500 leading-relaxed mb-4">{{ $optimisation['message'] }}</p>
            <a href="{{ $optimisation['url'] }}" 
               class="inline-block px-5 py-2.5 bg-emerald-100 hover:bg-emerald-200 text-emerald-800 rounded-lg text-sm font-semibold transition-colors mb-5">
                {{ $optimisation['action'] }}
            </a>
            
            {{-- Graphique --}}
            <div class="flex items-end justify-center gap-2 h-28 p-5 bg-slate-50 rounded-xl">
                <div class="w-5 bg-slate-300 rounded-t h-[40%]"></div>
                <div class="w-5 bg-slate-300 rounded-t h-[60%]"></div>
                <div class="w-5 bg-primary-600 rounded-t h-[80%]"></div>
                <div class="w-5 bg-emerald-600 rounded-t h-[100%]"></div>
                <div class="w-5 bg-slate-300 rounded-t h-[70%]"></div>
            </div>
        </div>
    @endif

    {{-- Section Support --}}
    <div class="flex gap-4 bg-primary-50 rounded-2xl p-5 mt-6">
        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center text-white text-xl flex-shrink-0">🎧</div>
        <div>
            <h4 class="text-[15px] font-semibold text-slate-900 mb-1">Besoin d'aide avec un contrat ?</h4>
            <p class="text-[13px] text-slate-500 mb-3">Nos conseillers sont disponibles 24/7 pour vos démarches.</p>
            <a href="{{ route('support.index') }}" class="text-sm font-semibold text-primary-600 hover:text-primary-700">Contacter le support</a>
        </div>
    </div>

    {{-- Navigation Bottom --}}
    <nav class="fixed bottom-0 left-0 right-0 bg-white border-t border-slate-200 flex justify-around py-2 z-50 md:max-w-mobile md:mx-auto md:left-1/2 md:-translate-x-1/2">
        <a href="{{ route('home') }}" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
            </svg>
            <span>Accueil</span>
        </a>
        <a href="{{ route('contrats.index') }}" class="bottom-nav-item actif">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span>Contrats</span>
        </a>
        <a href="{{ route('factures.index') }}" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/>
            </svg>
            <span>Factures</span>
        </a>
        <a href="{{ route('profil.index') }}" class="bottom-nav-item">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <span>Profil</span>
        </a>
    </nav>

</div>
@endsection