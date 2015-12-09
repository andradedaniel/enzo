<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 09/12/15
 * Time: 19:32
 */

namespace App\Services;

use App\Repositories\InvestidorRepository;

class InvestidorService
{
    /**
     * @var InvestidorRepository
     */
    protected $repository;

    /**
     * @param InvestidorRepository $repository
     */
    public function __construct(InvestidorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

}