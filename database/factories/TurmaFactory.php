<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Turma>
 */
class TurmaFactory extends Factory
{

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'codigo' => fake()->unique()->numerify('TURMA-####'),
            'curso_id' => (Curso::All()->random())->id,
            'data_inicio' => fake()->date(),
            'data_fim' => fake()->date(),
        ];
    }
}
