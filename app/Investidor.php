<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investidor extends Model
{
    public function aportesFinanceiro()
    {
        return $this->hasMany('App\AporteFinanceiro');
    }
}
