<?php

namespace Database\Factories;

use App\Models\Chapters;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapters>
 */
class ChaptersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $class = Classes::inRandomOrder()->first();
        return [

            'tags' => 'test',
            'belongs_to' => $class->id,
            'description'=>fake()->text(),
            'title'=>fake()->title()

        ];
    }
}
