<?php


namespace App\Http\Requests;

class TokenRequestValidator extends ValidationRequest
{
    /** @var array $rules */
    public $rules = [
        'login' => 'required',
        'password' => 'required'
    ];

    /** @var array $rules */
    public $messages = [
        'login.required' => 'Informe um login válido',
        'password.required' => 'Informe uma senha válida'
    ];
}
