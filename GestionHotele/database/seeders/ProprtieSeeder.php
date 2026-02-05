<?php

namespace Database\Seeders;

use App\Models\Proprtie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProprtieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proprties = ['Wi-fi', 'Clime', 'Vue sur mer', 'Romantique', 'Aventure'];
        foreach ($proprties as $proprtie) {
            Proprtie::create([
            'name' => $proprtie,
            ]);
        }
    }
}
