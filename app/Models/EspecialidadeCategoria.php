<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EspecialidadeCategoria extends Model
{
    use HasFactory;

    protected $table = 'especialidade_categorias';

    protected $fillable = [
        'nome',
    ];
}
