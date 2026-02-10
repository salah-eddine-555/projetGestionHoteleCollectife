<?php

namespace Database\Seeders;

use App\Models\Chambre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChambresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chambre::factory()->count(100)->create();
    }
}
