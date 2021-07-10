<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    protected $fillable = [
        'id', 
        'pontuacao',
        'premio',
        'updated_at'
    ];
}