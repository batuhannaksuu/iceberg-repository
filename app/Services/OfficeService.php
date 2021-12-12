<?php

namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Repositories\Contracts\OfficeRepositoryContract;

class OfficeService
{

    protected $officeRepositoryContract,$responseHelper;

    public function __construct(OfficeRepositoryContract $officeRepositoryContract,ResponseHelper $responseHelper)
    {
        $this->officeRepositoryContract = $officeRepositoryContract;
        $this->responseHelper = $responseHelper;
    }

    public function getOffice()
    {
        $office = $this->officeRepositoryContract->getOffice();
        $data = [
                'lat' => $office->lat,
                'lng' => $office->lng
            ];
        return $data;
    }
}
