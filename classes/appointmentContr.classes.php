<?php

class AppointmentContr extends Appointment {

    private $date;
    private $time;
    private $brand;
    private $model;
    private $description;
    private $client_id;
    private $mechanic_id;
    
    public function __construct($brand, $model, $time, $date, $description, $client_id, $mechanic_id) {
        $this->date = $date;
        $this->time = $time;
        $this->brand = $brand;
        $this->model = $model;
        $this->description = $description;
        $this->client_id = $client_id;
        $this->mechanic_id = $mechanic_id;
    }

    public function bookAppointment() {

        $this->setAppointment($this->brand, $this->model, $this->time, $this->date, $this->description, $this->client_id, $this->mechanic_id);
    }


    
}