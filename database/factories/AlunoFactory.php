<?php

namespace Database\Factories;

use App\Models\Aluno;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CategoriaAluno;

class AlunoFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->numerify('###.###.###-##'),
            'telefone' => fake()->phoneNumber(),
            'categoria_id' => (CategoriaAluno::All()->random())->id,
        ];
    }
}
