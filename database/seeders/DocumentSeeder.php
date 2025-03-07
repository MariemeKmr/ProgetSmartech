<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;
use App\Models\Employe;
use Illuminate\Support\Facades\Log;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($index = 1; $index <= 10; $index++) {
            $employe = Employe::inRandomOrder()->first();

            if ($employe) {
                Document::create([
                    'titre' => 'Document ' . $index,
                    'description' => 'Description pour le document ' . $index,
                    'date_creation' => now(),
                    'employe_id' => $employe->id,
                    'type' => 'pdf',
                    'chemin' => 'path/to/document1.pdf',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                Log::warning("Aucun employé trouvé pour créer le document $index");
            }
        }
    }
}
