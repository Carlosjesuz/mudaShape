<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'senha'
    ];

    public function medida()
    {
        return $this->hasOne(Medida::class);
    }

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
