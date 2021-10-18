<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensalidade extends Model
{
    use HasFactory;

    protected $table = 'mensalidades';

    protected $fillable = [
        'desbravador_id', 'valor', 'data'
    ];

    public function desbravador()
    {
        return $this->belongsTo(Desbravador::class, 'desbravador_id');
    }

}
