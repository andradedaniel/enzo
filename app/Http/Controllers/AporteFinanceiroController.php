<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AporteFinanceiro;
use App\Investidor;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Storage;

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
        // Cria o objeto com os dados do request
        $aporte = new AporteFinanceiro;
        $aporte->valor = $request->valor;
        $aporte->data = Carbon::createFromFormat('d/m/Y', $request->data)->toDateString();

        // Prepara os dados para que seja feito o upload do arquivo
        $file = $request->file('comprovante');
        $extension = $file->getClientOriginalExtension();
        $path = 'comprovante_aporte/';
        $newFilename =  $path.
                        $aporte->investidor_id.'_'.
                        str_replace(['.',','],'',$aporte->valor).'_'.
                        $aporte->data.'.'.
                        $extension;

        $aporte->comprovante_path = $newFilename;
        $aporte->observacao = $request->observacao;
        $aporte->investidor_id = $request->investidor_id;

        // Verifica se o diretório permite escrita
        if ( ! File::isWritable(storage_path('app/'.$path)) )
        {
            //@TODO tratar este retorno para que nao dê crash no sistema, apenas apresente a msg na tela
            return '[ERRO] Diretorio sem permissão de escrita.';
        }

        $upload = Storage::disk('local')->put($newFilename, file_get_contents($file->getRealPath()));
        if( ! $upload)
            return 'errro';

        $aporte->save();
        return redirect()->route('aporte-financeiro.index')->with('status',"Aporte financeiro cadastrado com sucesso!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $mime = File::mimeType(storage_path('app/comprovante_aporte/'.$id));
        $contents = Storage::get('comprovante_aporte/'.$id);
        return (new Response($contents, 200))
              ->header('Content-Type', 'image/png');
        // dd($contents);
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
