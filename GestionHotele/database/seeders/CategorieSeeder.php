<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = ['Hôtel 1 étoile', 'Hôtel 2 étoiles', 'Hôtel 3 étoiles', 'Hôtel 4 étoiles', 'Hôtel 5 étoiles'];
        foreach ($categorie as $categorie) {
            Categorie::create([
            'name' => $categorie,
            ]);
        
        }
    }
}
