<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pessoa extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'senha'
    ];

    protected $password = 'senha';

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($pessoa) {
            if ($pessoa->isDirty('senha')) {
                $pessoa->senha = bcrypt($pessoa->senha);
            }
        });
    }

    public function medida()
    {
        return $this->hasMany(Medida::class);
    }

    protected $hidden = [
        'password',
        'remember_token'
    ];

}
