<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\OfficeService;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    protected $officeService,$responseHelper;
    public function __construct(OfficeService $officeService,ResponseHelper $responseHelper)
    {
        $this->officeService = $officeService;
        $this->responseHelper = $responseHelper;
    }

    public function getOffice()
    {
        $office = $this->officeService->getOffice();
        return $this->responseHelper->successResponse(true,'Information Office',$office);
    }
}
