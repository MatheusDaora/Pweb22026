<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    /** @use HasFactory<\Database\Factories\MatriculaFactory> */
    use HasFactory;

    protected $fillable = [
        'numero',
        'curso_id',
        'turma_id',
        'aluno_id',
        'data_matricula',
    ];

    protected $cast = [
        'curso_id' => 'integer',
        'turma_id' => 'integer',
        'aluno_id' => 'integer',
        'data_matricula' => 'date',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }

    public function turma()
    {
        return $this->belongsTo(Turma::class, 'turma_id');
    }

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_id');
    }
}
