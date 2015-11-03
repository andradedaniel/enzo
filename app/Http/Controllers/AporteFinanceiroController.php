<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AporteFinanceiro;
use App\Investidor;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class AporteFinanceiroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $aportes = AporteFinanceiro::with('investidor')->get();
        $totalDeAportes = AporteFinanceiro::sum('valor');
        return view('aporteFinanceiro.index',['aportes'=>$aportes,'totalDeAportes'=>$totalDeAportes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $investidores = Investidor::orderBy('nome')->get(['id','nome']);
        return view ('aporteFinanceiro.create',['investidores'=>$investidores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $aporte = new AporteFinanceiro;
        $aporte->valor = $request->valor;
        $aporte->data = Carbon::now();//createFromFormat('d-m-Y', $request->data)->toDateString();
        $aporte->comprovante_path = $request->comprovante;
        $aporte->observacao = $request->observacao;
        $aporte->investidor_id = $request->investidor_id;

        dd($aporte);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
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
