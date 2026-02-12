<?php

namespace Database\Factories;

use App\Models\Chambre;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class chambre_tagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $chambresId = Chambre::pluck('id')->toArray();
        $tagsId = Tag::pluck('id')->toArray();
        return [

            'chambre_id' => $this->faker->randomElement($chambresId),
            'tag_id' => $this->faker->randomElement($tagsId)

        ];
    }
}

            /* 2/2/1:50 */
