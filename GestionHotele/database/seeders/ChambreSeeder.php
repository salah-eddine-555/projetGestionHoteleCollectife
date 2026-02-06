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
            'hotel_id' => 2,
            'categorie_id' => 3,
            'number' => '99',
            'image' => 'images/DefaultImage.jpg',
            'price_per_night' => 180.00,
            'capacite' => 3,
            'description' => 'chambre standard confortable',
        ]);
        $chambre->tags()->attach([3,1]);
        $chambre->proprties()->attach([1,4]);
    }
}
