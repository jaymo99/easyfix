<?php

class Signup extends Dbh{

    protected function setMechanic($businessName, $location, $description, $phoneNumber, $email, $pwd) {
        $stmt = $this->connect()->prepare("INSERT INTO mechanic(name, town, description, phone, email, password) VALUES (?, ?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($businessName, $location, $description, $phoneNumber, $email, $hashedPwd))) {
            $stmt = null;
            header("location: ../mechanic-signup.php?error=stmtfailedONE");
            exit();
        }

        $stmt = null;
    }

    protected function setClient($firstName, $middleName, $lastName, $email, $pwd) {
        $stmt = $this->connect()->prepare("INSERT INTO client(f_name, m_name, l_name, email, password) VALUES (?, ?, ?, ?, ?);");

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);


        if(!$stmt->execute(array($firstName, $middleName, $lastName, $email, $pwd))) {
            $stmt = null;
            header("location: ../client-signup.php?error=stmtfailedONE");
            exit();
        }

        $stmt = null;
    }

    protected function checkUser($email, $table) {
        $sql = "SELECT * FROM " . $table . " WHERE email = ?;";
        $stmt = $this->connect()->prepare($sql);   
        
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            if($table == "mechanic"){
                header("location: ../mechanic-signup.php?error=stmtfailedTWO");
            }else{
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

    protected function emailTakenCheck($email, $table) {
        $result = null;   //boolean value true or false
        if($this->checkUser($email, $table)){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }
}