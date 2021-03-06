<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class AporteFinanceiro extends Model
{
    protected $fillable = ['valor','observacao','invetidor_id'];

    public function getValorAttribute($value)
    {
        return number_format($value,2,',','.');
    }

    public function investidor()
    {
        return $this->belongsTo('App\Models\Investidor');
    }

    // public static function totalDeAportes($investidor=null)
    // {
    //     if ( ! empty($investidor))
    //     {
    //             return DB::table('aporte_financeiros')
    //                         ->where('investidor_id',$investidor)
    //                         ->sum('valor');
    //     }
    //     return DB::table('aporte_financeiros')->sum('valor');
    //
    // }
}
