<?php

namespace Database\Factories;

use App\Models\Chambre;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class chambre_propertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $chambresId = Chambre::pluck('id')->toArray();
        $propertyId = Property::pluck('id')->toArray();
        return [

            'chambre_id' => $this->faker->randomElement($chambresId),
            'tag_id' => $this->faker->randomElement($propertyId)

        ];
    }
}
