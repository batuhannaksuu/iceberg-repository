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
        $process = $this->appointmentProcess($data);
        if ($process['success'])
        {
            $result = $this->appointmentRepositoryContract->createAppointment($process);
            if ($result)
            {
                $data = [
                    'success' => true,
                    'contact' => $process['contact_id'],
                    'message' => 'Contact and appointment created',
                    'data' => $result,
                    'code' => 201,
                ];
                return $data;
            } else {
                $data = [
                  'success' => false,
                  'contact' => $process['contact_id'],
                  'message' => 'Internal Server Error',
                  'data' => $result,
                  'code' => 500
                ];
                return $data;
            }
        } else {
            return $process;
        }


    }
    public function lists($date)
    {
        $lists = $this->appointmentRepositoryContract->list($date);
        if ($lists != null)
        {
            return $this->responseHelper->successResponse(true,'appointment lists',$lists);
        } else {
            return $this->responseHelper->errorResponse(false,'error');
        }
    }
    public function listByDate($startDate,$endDate)
    {
        $startDate = date('Y-m-d H:i:s',strtotime($startDate.' 00:00:00'));
        $endDate = date('Y-m-d H:i:s',strtotime($endDate.' 23:59:00'));
        $listByDate = $this->appointmentRepositoryContract->listByDate($startDate,$endDate);
        if ($listByDate != null)
        {
            return $this->responseHelper->successResponse(true,'Appointment lists',$listByDate);
        } else {
            return $this->responseHelper->errorResponse(false,'Appointment null');
        }
    }
    public function updateAppointment($id,array $data)
    {
        $has = $this->hasAppointment($id);
        if ($has > 0)
        {
            $process = $this->appointmentProcess($data);
            if ($process['success'])
            {
                $result = $this->appointmentRepositoryContract->updateAppointment($id,$process);
                if ($result)
                {
                    return $this->responseHelper->successResponse(true,'appointment updated','true',201);
                } else {
                    return $this->responseHelper->errorResponse(false,'not update');
                }
            } else {
                return $process;
            }

        } else {
            return $this->responseHelper->errorResponse(false,'Not found appointment',404);
        }
    }
    public function appointmentProcess(array $data)
    {
        if (isset($data['contact_id'])) {
            $contact_id = $data['contact_id'];
        } else {
            $contact_id = null;
        }

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

                    $appointment_date = $appointment_date . ' ' . $appointment_time;
                    $distance = $googleDistance['distance'];

                    $check = $this->checkAppointmentTime($travel_start_time,$travel_end_time);
                    if($check == '0') {

                        $datum = [
                            'success' => true,
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

                        return $datum;

                    } else {
                        $data = [
                            'success' => false,
                            'contact' => $contact_id,
                            'message' => 'Appointment time is full'
                        ];
                        return $data;
                    }

                } else {
                    $data = [
                        'success' => false,
                        'contact' => $contact_id,
                        'message' => 'Not found reverseDistance'
                    ];
                    return $data;
                }
            } else {
                $data = [
                    'success' => false,
                    'contact' => $contact_id,
                    'message' => 'Not found googleDistance'
                ];
                return $data;

            }

        } else {
            $data = [
                'success' => false,
                'message' => 'Not found post code'
            ];
            return $data;
        }

    }
    public function hasAppointment(int $id)
    {
        $has = $this->appointmentRepositoryContract->hasAppointment($id);
        return $has;
    }
    public function checkAppointmentTime($travelStartTime,$travelEndTime)
    {
        $check = $this->appointmentRepositoryContract->checkAppointmentTime($travelStartTime,$travelEndTime);
        return count($check);
    }
    public function deleteAppointment(int $id)
    {
        $has = $this->hasAppointment($id);
        if($has > 0 )
        {
            $forceDelete = $this->appointmentRepositoryContract->deleteAppointment($id);
            if ($forceDelete)
            {
                return $this->responseHelper->successResponse(true,'Appointment deleted',$forceDelete,201);
            } else {
                return $this->responseHelper->errorResponse(false,'Internal Server Error',500);
            }
        } else {
            return  $this->responseHelper->errorResponse(false,'Not founde appointment',404);
        }
    }


}
