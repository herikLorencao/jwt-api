<?php


namespace App\Http\Requests;


abstract class ValidationRequest
{
    /** @var array $rules */
    public $rules = [];

    /** @var array $messages */
    public $messages = [];

    /** @var array $customAttributes */
    public $customAttributes = [];
}
