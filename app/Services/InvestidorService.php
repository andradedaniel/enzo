<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 09/12/15
 * Time: 19:32
 */

namespace App\Services;

use App\Repositories\InvestidorRepository;
use App\Validators\InvestidorValidator;
use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;

class InvestidorService
{
    /**
     * @var InvestidorRepository
     */
    protected $repository;
    /**
     * @var InvestidorValidator
     */
    private $validator;

    /**
     * @param InvestidorRepository $repository
     * @param InvestidorValidator $validator
     */
    public function __construct(InvestidorRepository $repository, InvestidorValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @return Response
     */
    public function store(array $data)
    {
        try{
            $this->validator->with($data)->passesOrFail();
            $investidor = $this->repository->create($data);

            return response()->json([
                'message'=>'Investidor cadastrado com sucesso',
                'data'=>$investidor->toArray()
            ]);
        } catch (ValidatorException $e) {
            return [
                'error'=>true,
                'message'=>$e->getMessageBag()
            ];
        }
    }

}