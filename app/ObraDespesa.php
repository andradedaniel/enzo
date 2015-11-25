<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObraDespesa extends Model
{
    protected $table = 'obra_despesas';

    public function tipoDespesa()
    {
        return $this->belongsTo('App\ObraTipoDespesa','obra_tipo_despesa_id');
    }

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }
}
