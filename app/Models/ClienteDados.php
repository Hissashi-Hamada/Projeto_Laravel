<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClienteDados extends Model
{
    protected $fillable = [
        'nome_cliente',
        'email',
        'telefone',
        'data_nascimento',
        'cpf',
        'nome_sobrenome',
        'nome_cartao',
        'numero_cartao',
        'data_vencimento',
        'codigo_seguranca',
    ];
}
