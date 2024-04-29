<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TypeAtelier;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AtelierFactory extends Factory
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
            'prix' => rand(1, 100),
            'date' => $this->faker->unique()->dateTimeBetween('-7 days', '+2 months')->format('Y-m-d'),
            'type_atelier_id' => rand(1, TypeAtelier::count()),
        ];
    }
}