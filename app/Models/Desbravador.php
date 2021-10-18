<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desbravador extends Model
{
    use HasFactory;

    protected $table = 'desbravadores';

    protected $fillable = [
        'nome','email','documento','unidade_id','foto'
    ];

}
