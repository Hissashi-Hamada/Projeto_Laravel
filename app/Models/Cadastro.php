<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cadastro extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'cadastros';

    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'telefone',
        'email',
        'senha',
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'data_nascimento' => 'date',
    ];

    /**
     * Return the password for authentication (custom column `senha`).
     */
    public function getAuthPassword()
    {
        return $this->senha;
    }
}
