<?php

namespace App\Services;

use App\Repositories\Contracts\AppointmentRepositoryContract;
use App\Repositories\Contracts\ContactRepositoryContract;

class ContactService
{
    protected $contactRepositoryContract,$appointmentService;

    public function __construct(ContactRepositoryContract $contactRepositoryContract, AppointmentService $appointmentService)
    {
        $this->contactRepositoryContract = $contactRepositoryContract;
        $this->appointmentService = $appointmentService;
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

            return $appointment;

        } else {
            return false;
        }
    }
}
