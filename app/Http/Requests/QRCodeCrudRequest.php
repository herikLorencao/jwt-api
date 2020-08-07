<?php


namespace App\Http\Requests;


class QRCodeCrudRequest extends ValidationRequest
{
    public $rules = [
        'codigo' => 'required|string',
        'produtoId' => 'required|integer'
    ];

    public $messages = [
        'codigo.required' => 'O campo codigo deve ser informado',
        'codigo.string' => 'Informe o campo codigo em um formato válido',
        'produtoId.required' => 'O campo produtoId deve ser informado',
        'produtoId.integer' => 'Informe o campo produtoInt no formato de número inteiro'
    ];
}
