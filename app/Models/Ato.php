<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ato extends Model
{
    use HasFactory;

    protected $table = 'atos';

    protected $fillable = [
        'descricao',
        'titulo',
        'arquivo',
    ];
}
