<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(),
            'description'=>fake()->text(),
            'rooms_id'=>fake()->numberBetween(1,50),
            'start'=>fake()->dateTime(),
            'end'=>fake()->dateTime(),
        ];
    }
}
