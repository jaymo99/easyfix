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
        $sql = "SELECT mechanic.name, appointment.approval_status, appointment.date
        FROM appointment
        INNER JOIN mechanic ON appointment.mechanic_mech_id = mechanic.mech_id;";

        $stmt = $this->connect()->prepare($sql);

        if(!$stmt->execute(array($client_id))) {
            $stmt = null;
            header("location: ../client-appointments.php?error=appointmentContentFailed");
            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    }
}