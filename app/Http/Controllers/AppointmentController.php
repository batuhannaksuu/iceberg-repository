<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Services\AppointmentService;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    protected $responseHelper,$appointmentService;
    public function __construct(ResponseHelper $responseHelper,AppointmentService $appointmentService)
    {
        $this->responseHelper = $responseHelper;
        $this->appointmentService = $appointmentService;
    }
    public function create(Request $request)
    {
        $create = $this->appointmentService->create($request->all(),1);
    }
}
