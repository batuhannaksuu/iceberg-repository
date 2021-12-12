<?php

namespace App\Repositories\Contracts;

interface AppointmentRepositoryContract
{
    public function createAppointment(array $data);

    public function checkAppointment($travelStartTime,$travelEndTime);
}
