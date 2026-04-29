<?php

namespace Database\Seeders;

use App\Models\Contrat;
use App\Models\Facture;
use App\Models\User;
use Illuminate\Database\Seeder;

class ContratSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::factory()->create([
            'name' => 'Jean Dupont',
            'email' => 'jean@example.com',
            'password' => bcrypt('password'),
        ]);

        // Électricité
        $elec = Contrat::create([
            'numero_contrat' => 'ELEC-2024-99812',
            'type' => Contrat::TYPE_ELECTRICITE,
            'titre' => 'Fourniture Électricité',
            'statut' => Contrat::STATUT_ACTIF,
            'adresse' => '42 Avenue des Champs-Élysées',
            'ville' => 'Paris',
            'code_postal' => '75008',
            'dernier_montant_facture' => 84.50,
            'date_derniere_facture' => now()->subDays(15),
            'details_techniques' => [
                'puissance' => '9 kVA',
                'option' => 'Base',
                'compteur' => '123456789',
            ],
        ]);
        $elec->users()->attach($user->id, ['role' => 'proprietaire']);

        // Eau
        $eau = Contrat::create([
            'numero_contrat' => '8472-H20',
            'type' => Contrat::TYPE_EAU,
            'titre' => 'Abonnement Eau',
            'statut' => Contrat::STATUT_ACTIF,
            'adresse' => 'Résidence du Parc, Bâtiment B',
            'ville' => 'Nantes',
            'code_postal' => '44000',
            'meta_donnees' => ['consommation' => 'optimal'],
        ]);
        $eau->users()->attach($user->id, ['role' => 'proprietaire']);

        // Fibre
        $fibre = Contrat::create([
            'numero_contrat' => 'FTTH-002',
            'type' => Contrat::TYPE_FIBRE,
            'titre' => 'Fibre Optique',
            'statut' => Contrat::STATUT_VERIFICATION,
            'adresse' => '42 Avenue des Champs-Élysées',
            'ville' => 'Paris',
            'code_postal' => '75008',
        ]);
        $fibre->users()->attach($user->id, ['role' => 'proprietaire']);

        // ========== FACTURES ==========

        // Facture électricité EN RETARD
        Facture::create([
            'contrat_id' => $elec->id,
            'numero_facture' => '88291-EA',
            'montant' => 142.50,
            'date_emission' => now()->subDays(30),
            'date_echeance' => now()->subDays(14),
            'statut' => 'en_retard',
        ]);

        // Facture eau EN ATTENTE
        Facture::create([
            'contrat_id' => $eau->id,
            'numero_facture' => 'W-2023-09',
            'montant' => 38.12,
            'date_emission' => now()->subDays(45),
            'date_echeance' => now()->subDays(15),
            'statut' => 'en_attente',
        ]);

        // Facture fibre PAYÉE
        Facture::create([
            'contrat_id' => $fibre->id,
            'numero_facture' => 'F-2023-10',
            'montant' => 29.99,
            'date_emission' => now()->subDays(60),
            'date_echeance' => now()->subDays(30),
            'statut' => 'payee',
        ]);

        // Facture électricité bureau EN ATTENTE
        Facture::create([
            'contrat_id' => $elec->id,
            'numero_facture' => '99201-EB',
            'montant' => 84.00,
            'date_emission' => now()->subDays(20),
            'date_echeance' => now()->subDays(5),
            'statut' => 'en_attente',
        ]);
    }
}