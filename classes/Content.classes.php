<?php

class Content extends Dbh {
    protected function getAllMechanics() {
        $sql = "SELECT * FROM mechanic;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedContent");
            exit();
        }

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getMechanic($mech_id) {
        $sql = "SELECT * FROM mechanic WHERE mech_id=?;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($mech_id))) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedContent2");
            exit();
        }

        $results = $stmt->fetchAll();
        return $results;
    }

    protected function getClientAppointments($client_id) {
        $sql = "SELECT mechanic.name, mechanic.town, appointment.appointment_id, appointment.approval_status, appointment.date, appointment.problem_description
        FROM appointment
        INNER JOIN mechanic ON appointment.mechanic_mech_id = mechanic.mech_id
        WHERE appointment.client_client_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_id))) {
            $stmt = null;
            header("location: ../client-appointments.php?error=appointmentContentFailed");
            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    protected function getMechanicAppointments($mech_id) {
        $sql = "SELECT client.f_name, client.m_name, client.l_name, appointment.appointment_id, appointment.approval_status, appointment.vehicle_brand, appointment.vehicle_model, appointment.date, appointment.time, appointment.problem_description
        FROM appointment
        INNER JOIN client ON appointment.client_client_id = client.client_id
        WHERE appointment.mechanic_mech_id = ?;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($mech_id))) {
            $stmt = null;
            header("location: ..mechanic-appointments.php?error=appointmentContentFailed");
            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }

    protected function getMechanicLocations(){
        $sql = "SELECT longitude, latitude FROM mechanic;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: ../index.php?error=stmtfailedFetch");
            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}