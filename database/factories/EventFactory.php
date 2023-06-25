<?php

namespace Database\Factories;

use App\Models\Recipes;
use http\Client\Curl\User;
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

        $user = \App\Models\User::inRandomOrder()->where('role','chef')->first()->username;

        return [
            'title' => $faker->sentence,
            'description' => $faker->text,
            'room_id' => $faker->numberBetween(1, 10),
            'max_participants' => $faker->numberBetween(1, 15),
            'duration' => $duration,
            'start' => $start,
            'chef_username' => $user ,
            'recipe_id' => Recipes::inRandomOrder()->first()->id,
            'is_validated' => $faker->numberBetween(0,1),
        ];
    }
}
