<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
