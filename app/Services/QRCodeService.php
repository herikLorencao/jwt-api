<?php


namespace App\Services;


use App\QRCode;

class QRCodeService extends CrudService
{

    /**
     * QRCodeService constructor.
     */
    public function __construct()
    {
        $this->resourceName = QRCode::class;
    }
}
