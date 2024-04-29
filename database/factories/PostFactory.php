<?php

namespace Database\Factories;

use App\Models\CategoriePost;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TypePost;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nom' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'date' => $this->faker->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
            'categorie_post_id' => rand(1, CategoriePost::count()),
        ];
    }
}