<?php

namespace Database\Factories;

use App\Models\Chapters;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition(): array
    {

        $user = User::inRandomOrder()->first();

        return [
            'chef_id' => $user->id,
            'tags' => 'test',
            'description'=>fake()->text(),
            'title'=>fake()->title()
        ];
    }
}
