<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $user = Auth::user();
        
        $typeFilter = $request->get('type', 'tous');
        $statusFilter = $request->get('status', 'tous');

        $query = Facture::whereHas('contrat', function ($q) use ($user) {
            $q->whereHas('users', fn($uq) => $uq->where('users.id', $user->id));
        })->with('contrat');

        if ($typeFilter !== 'tous' && in_array($typeFilter, ['electricite', 'eau', 'fibre_optique', 'gaz'])) {
            $query->whereHas('contrat', fn($q) => $q->where('type', $typeFilter));
        }

        if ($statusFilter !== 'tous' && in_array($statusFilter, ['payee', 'en_attente', 'en_retard'])) {
            $query->where('statut', $statusFilter);
        }

        $factures = $query->orderBy('date_emission', 'desc')->get();

        $stats = [
            'total' => Facture::whereHas('contrat.users', fn($q) => $q->where('users.id', $user->id))->count(),
            'payee' => Facture::whereHas('contrat.users', fn($q) => $q->where('users.id', $user->id))->where('statut', 'payee')->count(),
            'en_attente' => Facture::whereHas('contrat.users', fn($q) => $q->where('users.id', $user->id))->where('statut', 'en_attente')->count(),
            'en_retard' => Facture::whereHas('contrat.users', fn($q) => $q->where('users.id', $user->id))->where('statut', 'en_retard')->count(),
        ];

        return view('factures.index', compact('factures', 'stats', 'typeFilter', 'statusFilter'));
    }
}