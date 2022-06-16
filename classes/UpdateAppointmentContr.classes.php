<?php

class UpdateAppointmentContr extends Appointment {

    private $status;
    private $appointment_id;
    
    public function __construct($status, $appointment_id) {
        $this->status = $status;
        $this->appointment_id = $appointment_id;
    }

    public function updateAppointment() {

        $this->updateAppointmentStatus($this->status, $this->appointment_id);
    }


    
}