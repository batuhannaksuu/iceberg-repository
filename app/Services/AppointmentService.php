<?php

namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Repositories\Contracts\AppointmentRepositoryContract;

class AppointmentService
{
    protected $appointmentRepositoryContract, $officeService,$responseHelper;

    public function __construct(AppointmentRepositoryContract $appointmentRepositoryContract, OfficeService $officeService,ResponseHelper $responseHelper)
    {
        $this->appointmentRepositoryContract = $appointmentRepositoryContract;
        $this->officeService = $officeService;
        $this->responseHelper = $responseHelper;
    }

    public function create(array $data)
    {

        $contact_id = $data['contact_id'];
        $appointment_address = $data['appointment_address'];
        $appointment_date = $data['appointment_date'];
        $appointment_time = $data['appointment_time'];
        $post_code = $data['post_code'];
        $checkPostCode = checkPostCode($post_code);
        if ($checkPostCode['success']) {
            $lat = $checkPostCode['lat'];
            $lng = $checkPostCode['lng'];
            $office = $this->officeService->getOffice();
            $office_lat = $office['lat'];
            $office_lng = $office['lng'];
            $googleDistance = getGoogle($office_lat, $office_lng, $lat, $lng);

            $reverseDistance = getGoogle($lat, $lng, $office_lat, $office_lng);

            if ($googleDistance != false) {
                if ($reverseDistance != false) {

                    //$gTime ($googleTime)
                    $gTime = explode(" ", $googleDistance['time']);
                    //$rTime ($reverseTime)
                    $rTime = explode(" ", $reverseDistance['time']);

                    $travel_start_time = null;
                    $travel_end_time = null;
                    //Time Control
                    if (isset($gTime[2])) {
                        //when he/she leave the office
                        $travel_start_time = $appointment_date . ' ' . date('H:i:s', strtotime('-' . $gTime[0] . ' hour -' . $gTime[2] . ' mins', strtotime($appointment_time)));
                    } else {
                        $travel_start_time = $appointment_date . ' ' . date('H:i:s', strtotime('-' . $gTime[0] . ' min', strtotime($appointment_time)));
                    }

                    //estimated appointment time 1 hour
                    $estimated_appointment_time = date('H:i:s',strtotime('1 hour',strtotime($appointment_time)));
                    //when will he/she be in the office
                    $travel_end_time = $appointment_date . ' ' . date('H:i:s', strtotime($reverseDistance['time'], strtotime($estimated_appointment_time)));


                    $check = $this->checkAppointment($travel_start_time,$travel_end_time);
                    if($check == '0') {
                        $appointment_date = $appointment_date . ' ' . $appointment_time;
                        $distance = $googleDistance['distance'];
                        $datum = [
                            'contact_id' => $contact_id,
                            'appointment_address' => $appointment_address,
                            'appointment_date' => $appointment_date,
                            'post_code' => $post_code,
                            'lat' => $lat,
                            'lng' => $lng,
                            'distance' => $distance,
                            'travel_start_time' => $travel_start_time,
                            'travel_end_time' => $travel_end_time
                        ];

                        $result = $this->appointmentRepositoryContract->createAppointment($datum);
                        return $this->responseHelper->successResponse(true,'Contact and appointment created',$result,201);
                    } else {
                        return $this->responseHelper->errorResponse(false,'Appointment time is full');
                    }

                } else {
                    return $this->responseHelper->errorResponse(false,'Not found reverseDistance');
                }
            } else {
                return $this->responseHelper->errorResponse(false,'Not found googleDistance');

            }


        } else {
            return $this->responseHelper->errorResponse(false,'Not found post code',404);
        }
    }



    public function checkAppointment($travelStartTime,$travelEndTime)
    {
        $check = $this->appointmentRepositoryContract->checkAppointment($travelStartTime,$travelEndTime);
        return $check;
    }

}
