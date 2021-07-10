<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profissionais extends Model
{
    protected $fillable = [
        'id', 
        'parceiro',
        'cpf',
        'email',
        'nascimento',
        'telefone',
        'area_atuacao',
        'chave_pix',
        'cep',
        'endereco',
        'bairro',
        'uf',
        'cidade',
        'perfil',
        'password',
        'pontuacao',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}