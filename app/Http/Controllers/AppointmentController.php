<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Appointment\UpdateAppointmentRequest;
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
    public function lists($date = 'asc')
    {
        $lists = $this->appointmentService->lists($date);
        return $lists;
    }
    public function listByDate($startDate,$endDate)
    {
        $listByDate = $this->appointmentService->listByDate($startDate,$endDate);
        return $listByDate;
    }

    public function updateAppointment($id,UpdateAppointmentRequest $request)
    {
        $update = $this->appointmentService->updateAppointment($id,$request->all());
        return $update;
    }

    public function deleteAppointment($id)
    {
        $delete = $this->appointmentService->deleteAppointment($id);
        return $delete;
    }
}
