<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Hotel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChambreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $hotel_id = Hotel::pluck('id')->toArray();
        $categorie_id = Categorie::pluck('id')->toArray();

        return [

            'hotel_id' => $this->faker->randomElement($hotel_id),
            'categorie_id' => $this->faker->randomElement($categorie_id),
            'quantity' => $this->faker->numberBetween(1, 20),
            'image' => 'images/DefaultImage.jpg',
            'price_per_night' => $this->faker->numberBetween(20, 500),
            'capacite' => $this->faker->numberBetween(1, 4),
            'description' => $this->faker->paragraph(),

        ];
    }
}
