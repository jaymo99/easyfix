<?php

session_start();

class Signup extends Dbh{

    protected function setMechanic($businessName, $location, $description, $phoneNumber, $email, $pwd) {
        $stmt = $this->connect()->prepare("INSERT INTO mechanic(name, town, description, phone, email, password) VALUES (?, ?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($businessName, $location, $description, $phoneNumber, $email, $hashedPwd))) {
            $stmt = null;
            $_SESSION['form-error'] = "Critical error, contact support";
            header("location: ../mechanic-signup.php?error=stmtfailedONE");
            exit();
        }

        $stmt = null;
    }

    protected function setClient($firstName, $middleName, $lastName, $email, $pwd) {
        $stmt = $this->connect()->prepare("INSERT INTO client(f_name, m_name, l_name, email, password) VALUES (?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($firstName, $middleName, $lastName, $email, $hashedPwd))) {
            $stmt = null;
            $_SESSION['form-error'] = "Critical error, contact support";
            header("location: ../client-signup.php?error=stmtfailedTWO");
            exit();
        }

        $stmt = null;
    }

    protected function isEmailTaken($email, $table) {
        $sql = "SELECT * FROM " . $table . " WHERE email = ?;";
        $stmt = $this->connect()->prepare($sql);   
        
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            if($table == "mechanic"){
                $_SESSION['form-error'] = "Critical error, contact support";
                header("location: ../mechanic-signup.php?error=stmtfailedTWO");
            }else{
                $_SESSION['form-error'] = "Critical error, contact support";
                header("location: ../client-signup.php?error=stmtfailedTWO");
            }
            exit();
        }

        $resultCheck = null;
        if($stmt->rowCount() > 0){
            $resultCheck = true;
        }else{
            $resultCheck = false;
        }

        return $resultCheck; 
    }

    protected function pwdMatch($pwd, $confirmPwd) {
        $result = null;   //boolean value true or false
        if($pwd !== $confirmPwd){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }


    // MECHANIC SETTINGS
    protected function setMechanicLocation($lat, $lng, $mech_id) {
        $stmt = $this->connect()->prepare("
            UPDATE mechanic
            SET latitude = ?, longitude = ?
            WHERE mech_id = ?;
        ");


        if(!$stmt->execute(array($lat, $lng, $mech_id))) {
            $stmt = null;
            $_SESSION['form-error'] = "Critical error, contact support";
            header("location: ../mechanic-signup.php?error=stmtfailedLOCATION");
            exit();
        }

        $stmt = null;
    }

}