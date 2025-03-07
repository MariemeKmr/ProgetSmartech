<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Désactiver temporairement les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Vider la table avant d'insérer des nouvelles données
        DB::table('clients')->truncate();

        // Réactiver les contraintes de clé étrangère
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Insérer des clients fictifs
        DB::table('clients')->insert([
            [
                'nom' => 'Diop',
                'prenom' => 'Awa',
                'email' => 'awa.diop@example.com',
                'telephone' => '770102030',
                'adresse' => 'Dakar, Sénégal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Fall',
                'prenom' => 'Moussa',
                'email' => 'moussa.fall@example.com',
                'telephone' => '778889900',
                'adresse' => 'Thiès, Sénégal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Ndiaye',
                'prenom' => 'Fatou',
                'email' => 'fatou.ndiaye@example.com',
                'telephone' => '765432189',
                'adresse' => 'Saint-Louis, Sénégal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
