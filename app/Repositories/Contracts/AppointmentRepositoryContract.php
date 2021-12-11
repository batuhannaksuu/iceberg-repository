<?php

namespace App\Repositories\Contracts;

interface AppointmentRepositoryContract
{
    public function createAppointment(array $data,int $id);
}
