<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',
    ];

    protected $cast = [
        'carga_horaria' => 'float',
        'valor' => 'float'
    ];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }
}
