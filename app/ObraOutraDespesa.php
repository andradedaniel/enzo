<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObraOutraDespesa extends Model
{
    protected $table = 'obras_outras_despesas';

    public function tipoOutrasDespesas()
    {
        return $this->belongsTo('App\ObraTipoOutrasDespesas','obra_tipo_outras_despesas_id');
    }

    public function obra()
    {
        return $this->belongsTo('App\Obra');
    }
}
