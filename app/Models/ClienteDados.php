<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteDados extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_nascimento',
        'endereco',
        'cartao_credito',
        'data_validade',
        'cvv',
        'cpf'
    ];
}
