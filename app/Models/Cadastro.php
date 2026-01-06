<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cadastro extends Model
{
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'senha',
        'email',
    ];
    protected $casts = [
        'data_nascimento' => 'date',
        'senha' => 'encrypted',
    ];
}
