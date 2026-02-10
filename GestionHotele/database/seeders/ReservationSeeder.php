<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reservation::create([
            'start_date'=> '2026-01-10',
            'end_date' => '2026-01-15',
            'user_id' => 2,
            'chambre_id'=> 5
        ]);
    }
}
