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
}