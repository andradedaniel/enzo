<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Investidor extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [];

    public function aportesFinanceiro()
    {
        return $this->hasMany('App\AporteFinanceiro');
    }

    public function obras()
    {
        return $this->belongsToMany('App\Obra')->withPivot('percentual_lucro');
    }

}
