<?php

namespace App\Services;

use App\Repositories\Contracts\AppointmentRepositoryContract;

class AppointmentService
{
    protected $appointmentRepositoryContract,$officeService;

    public function __construct(AppointmentRepositoryContract $appointmentRepositoryContract, OfficeService $officeService)
    {
        $this->appointmentRepositoryContract = $appointmentRepositoryContract;
        $this->officeService = $officeService;
    }

    public function create(array $data)
    {
        $contact_id = $data['contact_id'];
        $appointment_address = $data['appointment_address'];
        $appointment_date = $data['appointment_date'];
        $appointment_time = $data['appointment_time'];
        $post_code = $data['post_code'];
        $checkPostCode = checkPostCode($post_code);
        if($checkPostCode['success'])
        {
            $lat = $checkPostCode['lat'];
            $lng = $checkPostCode['lng'];
            $office = $this->officeService->getOffice();
            $office_lat = $office['lat'];
            $office_lng = $office['lng'];
            $google = getGoogle($office_lat,$office_lng,$lat,$lng);
            dd($google);

        } else {
            return $checkPostCode;
        }



    }
}
