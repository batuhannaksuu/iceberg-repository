<?php

namespace App\Services;

use App\Repositories\Contracts\OfficeRepositoryContract;

class OfficeService
{

    protected $officeRepositoryContract;

    public function __construct(OfficeRepositoryContract $officeRepositoryContract)
    {
        $this->officeRepositoryContract = $officeRepositoryContract;
    }

    public function getOffice()
    {
        $office = $this->officeRepositoryContract->getOffice();
        return $office;
    }
}
