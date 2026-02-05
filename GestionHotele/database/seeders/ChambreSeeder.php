<?php

namespace Database\Seeders;

use App\Models\Chambre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChambreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chambre = Chambre::create([
            'hotel_id' => 1,
            'categorie_id' => 4,
            'number' => '99',
            'image' => 'images/DefaultImage.jpg',
            'price_per_night' => 150.00,
            'capacite' => 4,
            'description' => 'chambre standard confortable',
        ]);
        $chambre->tags()->attach([2,1]);
        $chambre->proprties()->attach([1,3]);
    }
}
