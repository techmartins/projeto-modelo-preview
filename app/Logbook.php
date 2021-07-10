<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logbook extends Model
{
    protected $fillable = [
            'id',
            'entidade',
            'acao',
            'observacao',
            'id_usuario',
            'created_at',
    ];
}