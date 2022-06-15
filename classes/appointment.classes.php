<?php
session_start();

class Appointment extends Dbh {

    private $sql = "INSERT INTO appointment (vehicle_brand, vehicle_model, time, date, problem_description, client_client_id, mechanic_mech_id) VALUES (?, ?, ?, ?, ?, ?, ?);";


    protected function setAppointment($brand, $model, $time, $date, $description, $client_id, $mechanic_id) {
        $stmt = $this->connect()->prepare($this->sql);

        if(!$stmt->execute(array($brand, $model, $time, $date, $description, $client_id, $mechanic_id))) {
            $stmt = null;
            $_SESSION['appointment-error'] = "Cannot book appointment";
            header("location: ../view-mechanic.php?error=appointmentNotSet");
            exit();
        }

        $stmt = null;
    }

    protected function updateAppointmentStatus($status, $appointment_id) {
        $sql = "UPDATE appointment
        SET approval_status = ?
        WHERE appointment_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($status, $appointment_id))) {
            $stmt = null;
            $_SESSION['appointment-error'] = "Cannot update appointment Status";
            header("location: ../mechanic-appointments.php?error=appointmentStatusNotUpdated");
            exit();
        }

        $stmt = null;
    }

}