<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    protected $fillable = [
        'pessoa_id',
        'sexo1',
        'sexo2',
        'braco',
        'peito',
        'barriga',
        'coxa',
        'gluteo',
        'panturrilha',
        'peso',
        'altura',
        'idade'
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }

}
