<?php

class Content extends Dbh {
    protected function getMechanic() {
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
}