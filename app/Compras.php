<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compras extends Model
{
    protected $fillable = [
            'id',
            'id_empresa',
            'empresa',
            'cliente',
            'valor',
            'anotacao',
            'data_compra',
            'id_profissional',
            'created_at',
            'updated_at',
    ];
}
