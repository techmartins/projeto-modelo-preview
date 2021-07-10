<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    protected $fillable = [
            'id',
            'valor',
            'rt',
            'cliente',
            'contato',
            'indicador',
            'indicado',
            'id_indicado',
            'data_venda',
            'pontuacao_indicador',
            'descricao_servico',
            'perfil',
            'caed',
            'created_at',
            'updated_at',
    ];
}
