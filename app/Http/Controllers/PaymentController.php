<?php
// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $user = Auth::user();

        // Total payé en 2024
        $totalPaye2024 = Facture::whereHas('contrat', function ($q) use ($user) {
            $q->whereHas('users', fn($uq) => $uq->where('users.id', $user->id));
        })
        ->where('statut', 'payee')
        ->whereYear('date_emission', 2024)
        ->sum('montant');

        // Nombre de transactions
        $nbTransactions = Facture::whereHas('contrat', function ($q) use ($user) {
            $q->whereHas('users', fn($uq) => $uq->where('users.id', $user->id));
        })
        ->where('statut', 'payee')
        ->whereYear('date_emission', 2024)
        ->count();

        // Prochaine facture (la plus urgente non payée)
        $prochaineFacture = Facture::whereHas('contrat', function ($q) use ($user) {
            $q->whereHas('users', fn($uq) => $uq->where('users.id', $user->id));
        })
        ->whereIn('statut', ['en_attente', 'en_retard'])
        ->orderBy('date_echeance', 'asc')
        ->with('contrat')
        ->first();

        // Transactions récentes (payées)
        $transactions = Facture::whereHas('contrat', function ($q) use ($user) {
            $q->whereHas('users', fn($uq) => $uq->where('users.id', $user->id));
        })
        ->where('statut', 'payee')
        ->orderBy('date_emission', 'desc')
        ->with('contrat')
        ->take(10)
        ->get();

        return view('paiements.index', compact(
            'totalPaye2024',
            'nbTransactions',
            'prochaineFacture',
            'transactions'
        ));
    }
}