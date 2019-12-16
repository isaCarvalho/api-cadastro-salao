<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    protected $table = "vendas";

    public $timestamps = false;

    protected $fillable = [
        'id_pessoa',
        'id_servico'
    ];
}