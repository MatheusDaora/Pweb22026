<?php

namespace Database\Factories;

use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Matricula>
 */
class MatriculaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'numero' => fake()->unique()->numerify('MT-######'),
            'curso_id' => (Curso::All()->random())->id,
            'turma_id' => (Turma::All()->random())->id,
            'aluno_id' => (Aluno::All()->random())->id,
            'data_matricula' => fake()->date(),
        ];
    }
}
