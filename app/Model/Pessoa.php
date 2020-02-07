<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = "pessoas";

    public $timestamps = false;

    protected $fillable = [
        "primeiro_nome",
        "sobrenome",
        "email",
        "senha"
    ];
}
