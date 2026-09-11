<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaAluno extends Model
{
    /** @use HasFactory<\Database\Factories\CategoriaAlunoFactory> */
    use Hasfactory;

    protected $fillable = [
        'nome',
        'nivel'
    ];
}
