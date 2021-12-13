<?php

namespace App\Services;

use App\Helpers\ResponseHelper;
use App\Repositories\Contracts\AppointmentRepositoryContract;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactService
{
    protected $contactRepositoryContract,$appointmentService,$responseHelper;

    public function __construct(ContactRepositoryContract $contactRepositoryContract, AppointmentService $appointmentService,ResponseHelper $responseHelper)
    {
        $this->contactRepositoryContract = $contactRepositoryContract;
        $this->appointmentService = $appointmentService;
        $this->responseHelper = $responseHelper;
    }

    public function create(array $data)
    {
        $contact = [
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ];

        $contact = $this->contactRepositoryContract->createContact($contact);
        if(is_numeric($contact))
        {
            $appointment = [
                'contact_id' => $contact,
                'appointment_address' => $data['appointment_address'],
                'appointment_date' => $data['appointment_date'],
                'appointment_time' => $data['appointment_time'],
                'post_code' => $data['post_code']
            ];

            $appointment = $this->appointmentService->create($appointment);
            if ($appointment['success'])
            {
                return $this->responseHelper->successResponse(true,$appointment['message'],$appointment['data']);
            } else {
                $delete = $this->delete($appointment['contact']);
                if ($delete)
                {
                    return $this->responseHelper->successResponse(false,$appointment['message'],'contact deleted');
                } else {
                    return $this->responseHelper->errorResponse(false,'not delete contact');
                }
            }
        } else {
            return $this->responseHelper->errorResponse(false,'not create contact');
        }
    }
    public function delete(int $id)
    {
        $contact = $this->contactRepositoryContract->delete($id);
        return $contact;
    }
}
