<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'street' => fake()->streetName(),
        'city' => fake()->city(),
        'postal_code' => fake()->postcode(),
        'salle_number' => rand(1, 10),
        'tags' => "test",
        'description'=> fake()->text(),
        ];
    }
}
