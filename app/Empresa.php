<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'id', 
        'razao_social',
        'cnpj',
        'email',
        'ramo_atividade',
        'cep',
        'endereco',
        'bairro',
        'uf',
        'cidade',
        'contato',
        'referencia',
        'password',
        'pontuacao',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}