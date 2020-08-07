<?php


namespace App\Http\Controllers;


use App\Http\Requests\ProdutoCrudRequest;
use App\Services\ProdutoService;

class ProdutoController extends CrudController
{
    public function __construct()
    {
        $this->serviceClassName = ProdutoService::class;
        $this->requestFormClassName = ProdutoCrudRequest::class;
        parent::__construct();
    }
}
