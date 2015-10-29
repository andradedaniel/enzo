<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Investidor;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class InvestidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $investidores = Investidor::with('aportesFinanceiro')->get();
        foreach ($investidores as $investidor) {
            // print_r( $investidor->id);
            $investidor->total_investido = $investidor->aportesFinanceiro()->sum('valor');
            // print($investidor);
        }
        // $aportesFinanceiros = Investidor::with('aporteFinanceiro')->get();
        // dd($aportesFinanceiros->toArray());
        // foreach ($aportesFinanceiros as $key) {
        //     echo $aportesFinanceiros->aporteFinanceiro->observacao;
        // }

        return view ('investidor.index',['investidores'=>$investidores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('investidor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return view ('investidor.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        return view ('investidor.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
