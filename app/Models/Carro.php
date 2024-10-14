<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    /** @use HasFactory<\Database\Factories\CarroFactory> */
    use HasFactory;
    protected $fillable = [
            'id',
            'modelo',
            'color',
            'precio',
            'transmision',
            'submarca',
            'marca_id',
            'foto'
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }
}

