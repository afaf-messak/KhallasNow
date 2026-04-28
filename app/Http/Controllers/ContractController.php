<?php
// app/Http/Controllers/ContractController.php

namespace App\Http\Controllers;

use App\Models\Contrat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContractController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request): View
    {
        $user = Auth::user();
        $filtreType = $request->get('type', 'tous');

        $query = Contrat::forUser($user->id)
            ->with(['factures' => fn($q) => $q->latest('date_emission')->limit(1)]);

        if ($filtreType !== 'tous' && in_array($filtreType, [
            Contrat::TYPE_ELECTRICITE, Contrat::TYPE_EAU, Contrat::TYPE_FIBRE, Contrat::TYPE_GAZ
        ])) {
            $query->parType($filtreType);
        }

        $contrats = $query->orderBy('created_at', 'desc')->get();

        $stats = [
            'total' => Contrat::forUser($user->id)->count(),
            'electricite' => Contrat::forUser($user->id)->parType(Contrat::TYPE_ELECTRICITE)->count(),
            'eau' => Contrat::forUser($user->id)->parType(Contrat::TYPE_EAU)->count(),
            'fibre' => Contrat::forUser($user->id)->parType(Contrat::TYPE_FIBRE)->count(),
        ];

        $optimisation = $this->getOptimisation($contrats);

        return view('contrats.index', compact('contrats', 'stats', 'filtreType', 'optimisation'));
    }

    public function create(): View
    {
        return view('contrats.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:electricite,eau,fibre_optique,gaz',
            'titre' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:10',
            'numero_contrat' => 'required|string|unique:contrats',
        ]);

        $contrat = Contrat::create($validated);
        $contrat->users()->attach(Auth::id(), ['role' => 'proprietaire']);

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat créé avec succès.');
    }

    public function show(Contrat $contrat): View
    {
        $this->authorize('view', $contrat);
        $contrat->load('factures');
        return view('contrats.show', compact('contrat'));
    }

    public function edit(Contrat $contrat): View
    {
        $this->authorize('update', $contrat);
        return view('contrats.edit', compact('contrat'));
    }

    public function update(Request $request, Contrat $contrat)
    {
        $this->authorize('update', $contrat);
        
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'ville' => 'nullable|string|max:100',
            'code_postal' => 'nullable|string|max:10',
        ]);

        $contrat->update($validated);

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat mis à jour.');
    }

    public function destroy(Contrat $contrat)
    {
        $this->authorize('delete', $contrat);
        $contrat->delete();

        return redirect()->route('contracts.index')
            ->with('success', 'Contrat supprimé.');
    }

    public function optimisation(Contrat $contrat): View
    {
        $this->authorize('view', $contrat);
        return view('contrats.optimisation', compact('contrat'));
    }

    private function getOptimisation($contrats): ?array
    {
        $contratElec = $contrats->firstWhere('type', Contrat::TYPE_ELECTRICITE);
        
        if ($contratElec && $contratElec->statut === Contrat::STATUT_ACTIF) {
            return [
                'titre' => 'Optimisation de contrat',
                'message' => 'Nous avons détecté que vous pourriez économiser 12% sur votre contrat électricité en changeant pour l\'option "Heures Creuses".',
                'economie' => '12%',
                'action' => 'Voir l\'analyse',
                'url' => route('contracts.optimisation', $contratElec),
            ];
        }
        return null;
    }
}