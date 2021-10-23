<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizacao extends Model
{
    use HasFactory;
    
    protected $table = 'autorizacoes';

    protected $fillable = [
        'desbravador_id',
        'arquivo',
    ];

    public function desbravador()
    {
        return $this->belongsTo(Desbravador::class, 'desbravador_id');
    }
}
