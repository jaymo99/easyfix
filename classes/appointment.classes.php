<?php

class Appointment extends Dbh {

    private $sql = "INSERT INTO appointment (vehicle_brand, vehicle_model, time, date, problem_description, client_client_id, mechanic_mech_id) VALUES (?, ?, ?, ?, ?, ?, ?);";


    protected function setAppointment($brand, $model, $time, $date, $description, $client_id, $mechanic_id) {
        $stmt = $this->connect()->prepare($this->sql);

        if(!$stmt->execute(array($brand, $model, $time, $date, $description, $client_id, $mechanic_id))) {
            $stmt = null;
            $_SESSION['form_error'] = "Critical error";
            header("location: ../view-mechanic.php?error=appointmentNotSet");
            exit();
        }

        $stmt = null;
    }

}