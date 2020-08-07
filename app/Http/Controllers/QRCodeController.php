<?php


namespace App\Http\Controllers;


use App\Http\Requests\QRCodeCrudRequest;
use App\Services\QRCodeService;

class QRCodeController extends CrudController
{
    /**
     * QRCodeController constructor.
     */
    public function __construct()
    {
        $this->serviceClassName = QRCodeService::class;
        $this->requestFormClassName = QRCodeCrudRequest::class;
        parent::__construct();
    }
}
