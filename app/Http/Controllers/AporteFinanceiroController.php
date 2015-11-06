<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AporteFinanceiro;
use App\Investidor;
use App\Http\Requests;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Services\UploadFile;
use League\Flysystem\Exception;

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
        $path = config('enzo.uploads.comprovante_aporte.path');

        $data_aporte = Carbon::createFromFormat('d/m/Y', $request->data)->toDateString();

        // Prepara os dados para que seja feito o upload do arquivo
        $file = $request->file('comprovante');
        $extension = $file->getClientOriginalExtension();
        $newFilename =  $request->investidor_id.'_'.
                        str_replace(['.',','],'',$request->valor)
                        .'_'.$data_aporte
                        .'_'.str_random(2) //codigo aleatorio para casos onde pode existir arquivo com o mesmo nome
                        .'.'.$extension;

        // Cria o objeto com os dados do request
        $aporte = new AporteFinanceiro;
        $aporte->valor = $request->valor;
        $aporte->data = $data_aporte;
        $aporte->comprovante_path = $newFilename;
        $aporte->observacao = $request->observacao;
        $aporte->investidor_id = $request->investidor_id;

        $upload = new UploadFile();
        $retornoUpload = $upload->upload($path,$newFilename,$file);
        if ($retornoUpload['cod'] == 0)
            return redirect()->back()->with('status',$retornoUpload['msg']);

        // se deu certo o upload do comprovante, salva no banco o "aporte financeiro"
        try {
            $aporte->save();
        } catch (Exception $e) {
            $upload->deleteFile(); //se deu erro ao salvar no banco, tem q apagar o arquivo q foi upado
            var_dump($e->getMessage());
            //@TODO confirmar se o catch interrompe a execuçao do codigo
        }

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
        if (Storage::exists('app/comprovante_aporte/'.$id))
        {
            return 'Arquivo não encontrado';
        }
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
        return 'Funçao ainda não implementada!';
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
        return 'Funçao ainda não implementada!';
    }
}
