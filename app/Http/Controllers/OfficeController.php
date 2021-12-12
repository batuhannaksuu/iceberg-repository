<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\OfficeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $officeService;
    public function __construct(OfficeService $officeService)
    {
        $this->officeService = $officeService;
    }

    public function getOffice()
    {
        $office = $this->officeService->getOffice();
        return $office;
    }
}
