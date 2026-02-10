<?php

namespace Database\Factories;

use App\Models\Chambre;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $user_id = User::pluck('id')->toArray();
        $chambre_id = Chambre::pluck('id')->toArray();

        $randomDate = $this->faker->dateTimeBetween('now', '2027-12-31')->format('Y-m-d');
        $days = $this->faker->numberBetween(2, 30);

        $startDate = new Carbon($randomDate);
        $endDate = $startDate->addDays($days);

        return [
            "start_date" => $randomDate,
            "end_date" => $endDate,
            'user_id' => $this->faker->randomElement($user_id),
            'chambre_id' => $this->faker->randomElement($chambre_id)
        ];
    }
}
