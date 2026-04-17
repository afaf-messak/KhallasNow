@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#f7f9fc] flex flex-col pb-28">
    <!-- Header -->
    <div class="px-4 pt-6 pb-2 flex flex-col gap-2">
        <div class="text-xs text-blue-900 font-semibold tracking-widest uppercase">Gestion Patrimoine</div>
        <h1 class="text-2xl font-bold text-gray-900">Mes Contrats</h1>
        <button onclick="openModal()" class="mt-4 bg-blue-700 hover:bg-blue-800 text-white font-semibold px-5 py-2 rounded-xl shadow flex items-center justify-center gap-2 w-full">
            <span class="material-icons text-base">add</span> Nouveau Contrat
        </button>
    </div>
    <!-- Filtres -->
    <div class="flex gap-2 px-4 mt-6 overflow-x-auto hide-scrollbar">
        <button class="px-4 py-2 rounded-full bg-blue-700 text-white font-medium flex items-center gap-1 shadow"> <span class="material-icons text-base">all_inclusive</span> Tous</button>
        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-medium flex items-center gap-1"> <span class="material-icons text-base">bolt</span> Electricité</button>
        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-medium flex items-center gap-1"> <span class="material-icons text-base">water_drop</span> Eau</button>
        <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-700 font-medium flex items-center gap-1"> <span class="material-icons text-base">language</span> Fibre</button>
    </div>
    <!-- Liste des contrats dynamique -->
    <div class="mt-6 flex flex-col gap-6 px-4 w-full max-w-md mx-auto">
        @foreach($contracts as $contract)
        <div class="bg-white rounded-2xl shadow p-6 flex flex-col gap-3 relative border border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 flex items-center justify-center rounded-xl 
                    @if($contract['type'] === 'electricite') bg-green-50 @elseif($contract['type'] === 'eau') bg-blue-50 @else bg-purple-50 @endif">
                    @if($contract['type'] === 'electricite')
                        <span class="material-icons text-green-500 text-3xl">bolt</span>
                    @elseif($contract['type'] === 'eau')
                        <span class="material-icons text-blue-500 text-3xl">water_drop</span>
                    @else
                        <span class="material-icons text-purple-500 text-3xl">language</span>
                    @endif
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center gap-2 flex-wrap">
                        <span class="font-bold text-lg text-gray-900 truncate">{{ $contract['name'] }}</span>
                        @if(strtolower($contract['status']) === 'actif')
                            <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-semibold">ACTIF</span>
                        @elseif(strtolower($contract['status']) === 'optimal')
                            <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded-full font-semibold">Optimal</span>
                        @elseif(strtolower($contract['status']) === 'vérification')
                            <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-full font-semibold">Vérification…</span>
                        @endif
                    </div>
                    <div class="text-xs text-gray-400 mt-1">N° CONTRAT : {{ $contract['id'] }}</div>
                </div>
            </div>
            <div class="flex items-center gap-1 text-sm text-gray-600">
                <span class="material-icons text-base">location_on</span>
                <span>{{ $contract['address'] }}</span>
            </div>
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-2 mt-1">
                <div class="text-sm text-gray-700">
                    Dernière facture : <span class="font-semibold">{{ number_format($contract['amount'], 2, ',', ' ') }} €</span>
                </div>
                @if($contract['consumption'])
                <div class="text-xs bg-gray-50 rounded px-2 py-1 text-gray-500 border border-gray-100">Consommation : <span class="font-semibold text-gray-700">{{ $contract['consumption'] }}</span></div>
                @endif
            </div>
            <div class="flex items-center gap-2 mt-2">
                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Détails techniques</a>
                <button class="w-7 h-7 flex items-center justify-center rounded-full hover:bg-gray-100"><span class="material-icons text-base text-gray-500">content_copy</span></button>
                <button class="w-7 h-7 flex items-center justify-center rounded-full hover:bg-gray-100"><span class="material-icons text-base text-gray-500">more_vert</span></button>
            </div>
        </div>
        @endforeach
        <!-- Optimisation de contrat et aide ... (garde comme il est) -->
        <div class="bg-white rounded-2xl shadow p-5 flex flex-col gap-2 mt-2">
            <div class="font-semibold mb-2">Optimisation de contrat</div>
            <div class="text-gray-500 text-sm mb-4 text-center">
                Nous avons détecté que vous pourriez économiser 12% sur votre contrat électricité en changeant pour l’option "Heures Creuses".
            </div>
            <button class="bg-green-100 text-green-700 px-4 py-2 rounded-lg font-semibold w-fit mx-auto">Voir l’analyse</button>
            <div class="w-full flex items-end gap-2 h-24 mt-2">
                <div class="bg-blue-200 w-4 rounded-t h-10"></div>
                <div class="bg-blue-400 w-4 rounded-t h-16"></div>
                <div class="bg-green-400 w-4 rounded-t h-20"></div>
                <div class="bg-gray-300 w-4 rounded-t h-8"></div>
            </div>
        </div>
        <!-- Besoin d’aide -->
        <div class="bg-blue-50 rounded-2xl p-4 flex flex-col items-center mt-2">
            <div class="flex items-center gap-2 mb-2">
                <span class="material-icons text-blue-400">help_outline</span>
                <span class="font-semibold text-gray-700 text-sm">Besoin d’aide avec un contrat ?</span>
            </div>
            <div class="text-xs text-gray-500 text-center mb-2">Nos conseillers sont disponibles 24/7 pour vos démarches.</div>
            <a href="#" class="text-blue-700 underline font-semibold text-sm">Contacter le support</a>
        </div>
    </div>
    <!-- Navbar bas -->
    <nav class="fixed bottom-0 left-0 w-full bg-white border-t flex justify-around py-2 z-50">
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-blue-600">
            <span class="material-icons">home</span>
            <span class="text-xs">Accueil</span>
        </a>
        <a href="#" class="flex flex-col items-center text-blue-600">
            <span class="material-icons">description</span>
            <span class="text-xs">Contrats</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-blue-600">
            <span class="material-icons">receipt_long</span>
            <span class="text-xs">Factures</span>
        </a>
        <a href="#" class="flex flex-col items-center text-gray-400 hover:text-blue-600">
            <span class="material-icons">person</span>
            <span class="text-xs">Profil</span>
        </a>
    </nav>
</div>
<!-- Hide scrollbar for filters -->
<style>
.hide-scrollbar::-webkit-scrollbar { display: none; }
.hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>
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

<!-- Modal Nouveau Contrat -->
<div id="modal-nouveau-contrat" class="fixed inset-0 z-50 flex items-center justify-center bg-black/30 hidden">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative animate-fade-in">
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-700">
            <span class="material-icons">close</span>
        </button>
        <h2 class="text-xl font-bold mb-4">Nouveau Contrat</h2>
        <form>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Type de contrat</label>
                <select class="w-full rounded-lg border-gray-200 focus:ring-blue-500">
                    <option>Électricité</option>
                    <option>Eau</option>
                    <option>Fibre</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Nom du contrat</label>
                <input type="text" class="w-full rounded-lg border-gray-200 focus:ring-blue-500" placeholder="Ex: Fourniture Électricité" />
            </div>
            <div class="mb-3">
                <label class="block text-sm font-medium mb-1">Adresse</label>
                <input type="text" class="w-full rounded-lg border-gray-200 focus:ring-blue-500" placeholder="Adresse complète" />
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white rounded-lg py-2 font-semibold mt-2 hover:bg-blue-800">Créer</button>
        </form>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('modal-nouveau-contrat').classList.remove('hidden');
}
function closeModal() {
    document.getElementById('modal-nouveau-contrat').classList.add('hidden');
}
// Fermer le modal si on clique à l'extérieur
window.addEventListener('click', function(e) {
    const modal = document.getElementById('modal-nouveau-contrat');
    if (!modal.classList.contains('hidden') && e.target === modal) {
        closeModal();
    }
});
</script>
