<?php

namespace Database\Factories;

use App\Models\CategoriaAluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CategoriaAluno>
 */
class CategoriaAlunoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->unique()->randomElement([
                'FUNDAMENTAL',
                'MÉDIO',
                'GRADUAÇÃO',
                'PÓS-GRADUAÇÃO',
            ]),
            'nivel' => fake()->numberBetween(1, 4),
        ];
    }
}
