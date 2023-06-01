<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre'=>fake()->sentence(),
            'description'=>fake()->text(),
            'prix'=>fake()->numberBetween(1,50),
            'nb'=>fake()->numberBetween(1,50),
            'discount'=>fake()->numberBetween(0,1),
            'img'=>'#',
        ];
    }
}
