<?php

session_start();

class MechServices extends Dbh {
    protected function setService($mech_service, $mech_id) {
        $stmt = $this->connect()->prepare("INSERT INTO mechanic_services(service, mechanic_mech_id) VALUES (?, ?);");

        if(!$stmt->execute(array($mech_service, $mech_id))) {
            $stmt = null;
            $_SESSION['form-error'] = "Database error";
            header("location: ../mechanic-settings-services.php?error=stmtfailedDB");
            exit();
        }

        $stmt = null;
    }

    protected function deleteService($service_id) {
        $stmt = $this->connect()->prepare("DELETE FROM mechanic_services WHERE service_id=?;");

        if(!$stmt->execute(array($service_id))) {
            $stmt = null;
            $_SESSION['form-error'] = "Database error";
            header("location: ../mechanic-settings-services.php?error=stmtfailedDB2");
            exit();
        }

        $stmt = null;
    }
}