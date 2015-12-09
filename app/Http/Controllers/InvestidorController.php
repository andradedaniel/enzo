<?php

namespace App\Http\Controllers;

use App\Repositories\InvestidorRepository;
use Illuminate\Http\Request;
use App\Http\Requests;

class InvestidorController extends Controller
{
    private $repository;

    /**
     * InvestidorController constructor.
     * @param InvestidorRepository $repository
     */
    public function __construct(InvestidorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $investidores = $this->repository->all();
//        $investidores = Investidor::with('aportesFinanceiro','obras')->get();
        //$obras = Investidor::with('obras')->get();
        // dd($investidores);
        foreach ($investidores as $investidor) {
            $investidor->total_investido = $investidor->aportesFinanceiro()->sum('valor');
            //$investidor->obras()->get();
        }
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