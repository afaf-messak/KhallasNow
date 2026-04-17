@extends('layouts.app')

@section('content')
<main class="max-w-7xl mx-auto px-6 pt-12 md:pt-16 font-body bg-background min-h-screen pb-32">
    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <span class="uppercase tracking-widest text-xs font-bold text-primary mb-2 block">Gestion Patrimoine</span>
            <h1 class="font-headline font-extrabold text-4xl md:text-5xl text-on-surface tracking-tight">Mes Contrats</h1>
        </div>
        <button type="button" class="bg-gradient-to-r from-primary to-primary-container text-on-primary px-8 py-4 rounded-xl font-bold flex items-center gap-3 shadow-lg active:scale-95 duration-150 transition-all w-full md:w-auto justify-center focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
            <span class="material-symbols-outlined">add_circle</span>
            Nouveau Contrat
        </button>
    </div>
    <!-- Filters -->
    <div class="col-span-12 mb-4 overflow-x-auto no-scrollbar py-2">
        <div class="flex gap-4">
            <button type="button" class="flex-shrink-0 bg-primary text-on-primary px-6 py-3 rounded-full font-bold flex items-center gap-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined">all_inclusive</span> Tous
            </button>
            <button type="button" class="flex-shrink-0 bg-surface-container-high hover:bg-primary hover:text-white text-on-surface-variant px-6 py-3 rounded-full font-bold flex items-center gap-2 transition-colors focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined">bolt</span> Électricité
            </button>
            <button type="button" class="flex-shrink-0 bg-surface-container-high hover:bg-primary hover:text-white text-on-surface-variant px-6 py-3 rounded-full font-bold flex items-center gap-2 transition-colors focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined">water_drop</span> Eau
            </button>
            <button type="button" class="flex-shrink-0 bg-surface-container-high hover:bg-primary hover:text-white text-on-surface-variant px-6 py-3 rounded-full font-bold flex items-center gap-2 transition-colors focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-105 active:scale-95">
                <span class="material-symbols-outlined">language</span> Internet
            </button>
        </div>
    </div>
    <!-- Contracts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
        @foreach($contracts as $contract)
            <div class="col-span-12 md:col-span-4 bg-white rounded-3xl p-8 border border-gray-100 shadow-sm relative group transition-all hover:shadow-md">
                <div class="absolute top-0 right-0 p-6">
                    <span class="bg-secondary/10 text-secondary px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest">{{ $contract['status'] }}</span>
                </div>
                <div class="flex flex-col h-full">
                    <div class="w-14 h-14 rounded-2xl 
                        @if($contract['type'] === 'electricite') bg-green-100 text-green-700 
                        @elseif($contract['type'] === 'eau') bg-blue-100 text-blue-700 
                        @else bg-purple-100 text-purple-700 @endif
                        flex items-center justify-center mb-6">
                        <span class="material-symbols-outlined text-2xl">
                            @if($contract['type'] === 'electricite') bolt
                            @elseif($contract['type'] === 'eau') water_drop
                            @else language @endif
                        </span>
                    </div>
                    <h3 class="font-headline text-xl font-bold mb-1">{{ $contract['name'] }}</h3>
                    <p class="text-on-surface-variant font-label text-[10px] uppercase tracking-widest mb-6">N° {{ $contract['id'] }}</p>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-slate-400 mt-0.5">pin_drop</span>
                            <p class="text-sm font-medium leading-tight">{{ $contract['address'] }}</p>
                        </div>
                        @if($contract['consumption'])
                        <div class="bg-white/50 rounded-xl p-3 flex justify-between items-center">
                            <span class="text-xs font-bold text-slate-500">Consommation</span>
                            <span class="text-sm font-bold text-secondary">{{ $contract['consumption'] }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="mt-8 pt-8 border-t border-surface-container-low flex justify-between items-center gap-2">
                        <button type="button" class="text-primary font-bold text-sm hover:underline flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-105 active:scale-95">
                            Détails techniques
                            <span class="material-symbols-outlined text-sm">arrow_forward_ios</span>
                        </button>
                        <div class="flex -space-x-2">
                            <button type="button" class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-white flex items-center justify-center hover:bg-primary/10 focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-110 active:scale-95">
                                <span class="material-symbols-outlined text-xs">history</span>
                            </button>
                            <button type="button" class="w-8 h-8 rounded-full bg-surface-container-high border-2 border-white flex items-center justify-center hover:bg-primary/10 focus:outline-none focus:ring-2 focus:ring-primary transition-all hover:scale-110 active:scale-95">
                                <span class="material-symbols-outlined text-xs">analytics</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- يمكنك إضافة باقي أقسام التحليل والدعم كما في الكود الأصلي -->
    </div>
</main>
@endsection
