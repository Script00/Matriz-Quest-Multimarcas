<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $table = 'carros'; // Nome da tabela
    protected $fillable = [
        'user_id', 'nome_veiculo', 'link', 'ano', 'combustivel', 'portas',
        'quilometragem', 'cambio', 'cor', 'preco', 'titulo', 'ver_mais_link'
    ];
}