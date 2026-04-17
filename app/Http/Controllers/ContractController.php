<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        // Données mock
        $contracts = [
            [
                'id' => 1,
                'name' => 'Fourniture Électricité',
                'type' => 'electricite',
                'status' => 'Actif',
                'address' => '42 Avenue des Champs-Élysées, 75008 Paris',
                'amount' => 84.50,
                'consumption' => '1120 kWh',
            ],
            [
                'id' => 2,
                'name' => 'Abonnement Eau',
                'type' => 'eau',
                'status' => 'Optimal',
                'address' => '12 Rue de Paris, Bâtiment B, Nantes',
                'amount' => 32.10,
                'consumption' => '15 m³',
            ],
            [
                'id' => 3,
                'name' => 'Fibre Optique',
                'type' => 'fibre',
                'status' => 'Vérification',
                'address' => '21 Avenue des Champs-Élysées, Paris',
                'amount' => 29.99,
                'consumption' => null,
            ],
        ];

        return view('contracts.index', compact('contracts'));
    }
}
