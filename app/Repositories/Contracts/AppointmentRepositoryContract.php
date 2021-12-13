<?php

namespace App\Repositories\Contracts;

interface AppointmentRepositoryContract
{
    public function createAppointment(array $data);
    public function checkAppointmentTime($travelStartTime,$travelEndTime);
    public function list($date);
    public function listByDate($startDate,$endDate);
    public function updateAppointment($id,array $data);
    public function hasAppointment(int $id);
    public function deleteAppointment(int $id);
}
