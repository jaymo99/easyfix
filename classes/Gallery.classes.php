<?php

session_start();

class Gallery extends Dbh {
    protected function setImage($imagePath, $mech_id) {
        $stmt = $this->connect()->prepare("INSERT INTO mechanic_gallery(image_path, mech_id) VALUES (?, ?);");

        if(!$stmt->execute(array($imagePath, $mech_id))) {
            $stmt = null;
            $_SESSION['form-error'] = "Database error";
            header("location: ../mechanic-settings-gallery.php?error=stmtfailedDB");
            exit();
        }

        $stmt = null;
    }
}