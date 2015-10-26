<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContaBancaria;
use App\Http\Requests;
use App\Http\Requests\ContaBancariaRequest;
use App\Http\Controllers\Controller;

class ContaBancariaController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$contas = DB::select('select * from conta_bancaria');
        $contas = ContaBancaria::paginate(10);
        // $contas = ContaBancaria::where('nome_banco','like','banco%')->get();
        // $contas = ContaBancaria::findOrFail(2);
         return view('contaBancaria.index',['contas'=>$contas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('contaBancaria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ContaBancariaRequest $request)
    {
        $conta = new contaBancaria;
        $conta->nome_banco = $request->nome_banco;
        $conta->agencia = $request->agencia;
        $conta->num_conta = $request->num_conta;
        $conta->save();
        // ContaBancaria::create($request->all());
        return redirect()->route('contas.index')->with('status',"Conta bancaria <b>".$request->nome_banco."</b> cadastrada com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //dd($id);
        $conta = ContaBancaria::find($id);
        return view('contaBancaria.show',['conta'=>$conta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $conta = ContaBancaria::find($id);
        return view('contaBancaria.edit',['conta'=>$conta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(ContaBancariaRequest $request, $id)
    {
        $conta = ContaBancaria::find($id);
        $conta->update($request->all());
        return redirect()->route('contas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        ContaBancaria::destroy($id);
        return redirect()->route('contas.index');
    }
}
