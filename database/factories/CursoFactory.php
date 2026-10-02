<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'requisito' => fake()->sentence(1, 10),
            'carga_horaria' => fake()->randomFloat(2, 20, 120),
            'valor' => fake()->randomFloat(2, 10, 1000),
        ];
    }
}
