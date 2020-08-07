<?php


namespace App\Http\Requests;


class ProdutoCrudRequest extends ValidationRequest
{
    public $rules = [
        'nome' => 'required|string',
        'preco' => 'required|numeric'
    ];

    public $messages = [
        'nome.required' => 'O campo nome deve ser informado',
        'nome.string' => 'O tipo de campo nome deve ser string',
        'preco.required' => 'O campo preco deve ser informado',
        'preco.numeric' => 'O campo preco deve ser do tipo double'
    ];
}
