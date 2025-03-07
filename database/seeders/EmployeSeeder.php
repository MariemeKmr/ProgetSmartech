<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employe;
use Illuminate\Support\Facades\DB;

class EmployeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    // Désactiver temporairement les contraintes de clé étrangère
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    DB::table('employes')->truncate();

    // Réactiver les contraintes de clé étrangère
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Ajouter des employés fictifs
        Employe::create([
            'nom' => 'Kamara',
            'prenom' => 'Marieme',
            'poste' => 'Développeur',
            'email' => 'mariemekamara@esp.sn',
            'date_embauche' => now(),
        ]);

        Employe::create([
            'nom' => 'Ba',
            'prenom' => 'Amadou Billo',
            'poste' => 'Designer',
            'email' => 'amadoubillo@gmail.com',
            'date_embauche' => now(),
        ]);

        Employe::create([
            'nom' => 'Ka',
            'prenom' => 'Elimane',
            'poste' => 'Administrateur Réseau',
            'email' => 'elimaneka@yahoo.fr',
            'date_embauche' => now(),
        ]);

        Employe::create([
            'nom' => 'Sall',
            'prenom' => 'Fatoumata',
            'poste' => 'Administrateur Système',
            'email' => 'fatoumatasall@ucad.edu.sn',
            'date_embauche' => now(),
        ]);
    }
}
