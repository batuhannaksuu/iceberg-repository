<?php

namespace App\Services;

use App\Repositories\Contracts\AppointmentRepositoryContract;

class AppointmentService
{
    protected $appointmentRepositoryContract;

    public function __construct(AppointmentRepositoryContract $appointmentRepositoryContract)
    {
        $this->appointmentRepositoryContract = $appointmentRepositoryContract;
    }

    public function create(array $data,int $id)
    {
        return "createService";
    }
}
