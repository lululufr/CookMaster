<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use function PHPUnit\Framework\stringContains;

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
    public function definition()
    {
        $faker = \Faker\Factory::create();

        $start = $faker->dateTimeBetween('-1 week', '+1 week');
        $duration = $faker->numberBetween(1, 2);

        return [
            'title' => $faker->sentence,
            'description' => $faker->text,
            'rooms_id' => $faker->numberBetween(1, 10),
            'duration' => $duration,
            'tags' => 'test',
            'start' => $start,
        ];
    }
}
