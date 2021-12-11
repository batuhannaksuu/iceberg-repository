<?php

namespace App\Repositories;

use App\Models\Appointments;
use App\Repositories\Contracts\AppointmentRepositoryContract;

class AppointmentRepository implements AppointmentRepositoryContract
{
    public function createAppointment(array $data)
    {
        try {
            $appointment = new Appointments();
            $appointment->contact_id = $data['contact_id'];
            $appointment->appointment_address = $data['appointment_address'];
            $appointment->appointment_date = $data['appointment_date'];
            $appointment->post_code = $data['post_code'];
            $appointment->lat = $data['lat'];
            $appointment->lng = $data['lng'];
            $appointment->distance = $data['distance'];
            $appointment->travel_start_time = $data['travel_start_time'];
            $appointment->travel_end_time = $data['travel_end_time'];
            $result = $appointment->save();

            return $result;

        } catch (\Exception $e) {
            return $e->getMessage();
        }
        // TODO: Implement createAppointment() method.
    }

}
