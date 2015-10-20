<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContaBancaria extends Model
{
    protected $table = 'conta_bancaria';

    protected $fillable = ['nome_banco', 'agencia', 'num_conta'];
}
