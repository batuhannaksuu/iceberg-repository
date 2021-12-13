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
    }

    public function checkAppointmentTime($travelStartTime,$travelEndTime)
    {
        try {
            $check = Appointments::whereBetween('travel_start_time',[$travelStartTime,$travelEndTime])
                ->orWhereBetween('travel_end_time',[$travelStartTime,$travelEndTime])->get();
            return $check;
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function list($date)
    {
        try {
            $appointments = Appointments::orderBy('created_at',$date)->get();
            return $appointments;
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function listByDate($startDate, $endDate)
    {
        try{
            $appointments = Appointments::all()->whereBetween('created_at',[$startDate,$endDate]);
            return $appointments;
        } catch (\Exception $e)
        {
            return $e->getMessage();
        }
    }

    public function deleteAppointment(int $id)
    {
        $delete = Appointments::where('id',$id)->delete();
        return $delete;
    }

    public function updateAppointment($id,array $data)
    {
        try {
            $appointment = Appointments::where('id',$id)->first();
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
    }

    public function hasAppointment(int $id)
    {
        $has = Appointments::where('id',$id)->count();
        return $has;
    }

}
