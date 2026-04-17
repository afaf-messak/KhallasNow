@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white flex flex-col">
    <!-- Header -->
    <div class="p-4 flex flex-col gap-2">
        <h1 class="text-2xl font-bold text-gray-800">Mes Contrats</h1>
        <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition w-full md:w-auto">
            + Nouveau Contrat
        </button>
        <!-- Filtres -->
        <div class="flex gap-2 mt-4">
            <button class="filter-btn active">Tous</button>
            <button class="filter-btn">Électricité</button>
            <button class="filter-btn">Eau</button>
            <button class="filter-btn">Fibre</button>
        </div>
    </div>

    <!-- Liste des contrats -->
    <div class="flex-1 px-2 py-4 flex flex-col gap-4">
        @foreach($contracts as $contract)
        <div class="contract-card group">
            <div class="flex items-center gap-3">
                <!-- Icône -->
                <div class="icon-bg">
                    @if($contract['type'] === 'electricite')
                        <x-heroicon-o-bolt class="icon-electricity"/>
                    @elseif($contract['type'] === 'eau')
                        <x-heroicon-o-droplet class="icon-water"/>
                    @else
                        <x-heroicon-o-wifi class="icon-fibre"/>
                    @endif
                </div>
                <div class="flex-1">
                    <div class="flex items-center gap-2">
                        <span class="font-semibold text-lg">{{ $contract['name'] }}</span>
                        <span class="badge badge-{{ strtolower($contract['status']) }}">{{ $contract['status'] }}</span>
                    </div>
                    <div class="text-gray-500 text-sm flex items-center gap-1">
                        <x-heroicon-o-map-pin class="w-4 h-4"/>
                        {{ $contract['address'] }}
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-between mt-3">
                <div>
                    <div class="text-gray-700 font-bold text-xl">{{ number_format($contract['amount'], 2, ',', ' ') }} €</div>
                    @if($contract['consumption'])
                        <div class="text-xs text-gray-400">Conso: {{ $contract['consumption'] }}</div>
                    @endif
                </div>
                <button class="manage-btn">Gérer le contrat</button>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Optimisation de contrat -->
    <div class="px-4 py-6">
        <div class="bg-white rounded-xl shadow p-4 flex flex-col items-center">
            <div class="font-semibold mb-2">Optimisation de contrat</div>
            <div class="text-gray-500 text-sm mb-4 text-center">
                Nos analyses montrent que vous pouvez économiser 15% sur vos contrats actuels.<br>
                <button class="text-blue-600 underline mt-2">Voir l’analyse</button>
            </div>
            <!-- Chart simple (barres) -->
            <div class="w-full flex items-end gap-2 h-24">
                <div class="bg-blue-200 w-4 rounded-t h-10"></div>
                <div class="bg-blue-400 w-4 rounded-t h-16"></div>
                <div class="bg-green-400 w-4 rounded-t h-20"></div>
                <div class="bg-gray-300 w-4 rounded-t h-8"></div>
            </div>
        </div>
    </div>

    <!-- Navbar bas -->
    <nav class="fixed bottom-0 left-0 w-full bg-white border-t flex justify-around py-2 z-50">
        <a href="#" class="nav-btn active"><x-heroicon-o-home class="w-6 h-6"/></a>
        <a href="#" class="nav-btn"><x-heroicon-o-document-text class="w-6 h-6"/></a>
        <a href="#" class="nav-btn"><x-heroicon-o-receipt-percent class="w-6 h-6"/></a>
        <a href="#" class="nav-btn"><x-heroicon-o-user class="w-6 h-6"/></a>
    </nav>
</div>

<!-- Styles spécifiques -->
@push('styles')
<style>
    .contract-card {
        @apply bg-white rounded-2xl shadow p-4 transition hover:scale-[1.01] hover:shadow-lg;
    }
    .icon-bg {
        @apply w-12 h-12 flex items-center justify-center rounded-xl bg-blue-50;
    }
    .icon-electricity { @apply text-yellow-400 w-7 h-7; }
    .icon-water { @apply text-blue-400 w-7 h-7; }
    .icon-fibre { @apply text-green-400 w-7 h-7; }
    .badge-actif { @apply bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs; }
    .badge-optimal { @apply bg-blue-100 text-blue-700 px-2 py-0.5 rounded text-xs; }
    .badge-vérification { @apply bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded text-xs; }
    .manage-btn {
        @apply bg-blue-600 text-white px-3 py-1 rounded-lg shadow hover:bg-blue-700 transition;
    }
    .filter-btn {
        @apply px-3 py-1 rounded-full border border-gray-200 bg-white text-gray-700 hover:bg-blue-50 transition;
    }
    .filter-btn.active {
        @apply bg-blue-600 text-white border-blue-600;
    }
    .nav-btn {
        @apply flex flex-col items-center text-gray-400 hover:text-blue-600 transition;
    }
    .nav-btn.active {
        @apply text-blue-600;
    }
</style>
@endpush

@endsection
