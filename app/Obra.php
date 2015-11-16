<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obra extends Model
{
    public function investidores()
    {
        return $this->belongsToMany('App\Investidor')->withPivot('percentual_lucro');
    }

    public function outrasDespesas()
    {
        return ;
    }
}
