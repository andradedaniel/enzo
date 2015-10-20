<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContaBancariaRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_banco' => 'required|min:3',
            'agencia' => 'required',
            'num_conta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute não deve ficar vazio.',
            'agencia.required' => 'O número da agencia é obrigatório',
            'min' => ':attribute deve ter mais de :min caracteres.',
        ];
    }
}
