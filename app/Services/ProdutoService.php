<?php


namespace App\Services;


use App\Produto;

class ProdutoService extends CrudService
{

    /**
     * ProdutoService constructor.
     */
    public function __construct()
    {
        $this->resourceName = Produto::class;
    }
}
