<?php
/**
 * Created by PhpStorm.
 * User: daniel
 * Date: 09/12/15
 * Time: 21:25
 */

namespace App\Validators;


use Prettus\Validator\LaravelValidator;

class InvestidorValidator extends LaravelValidator
{
    protected $rules = [
        'nome' => 'required|min:3',
        'email' => 'email',
        'password' => 'required',
    ];
}