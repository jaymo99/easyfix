<?php

session_start();

class Login extends Dbh{

    protected function getClient($email, $pwd, $table) {
        $stmt = $this->connect()->prepare("SELECT password FROM $table WHERE email = ?");


        if(!$stmt->execute(array($email))) {
            $stmt = null;
            $_SESSION['form-error'] = "Critical error, Contact support";
            header("location: ../login.php?error=stmtfailedLogin");
            exit();
        }

        if($stmt->rowCount() == 0){
            $stmt = null;
            //row count can't be zero because we already verified the input email exists. Row count is at least 1
            $_SESSION['form-error'] = "Critical error, Contact support";
            header("location: ../login.php?error=stmtfailedLoginTWO");
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]['password']);

        if($checkPwd == false){
            $stmt = null;
            $_SESSION['form-error'] = "Invalid credentials";
            header("location: ../login.php?error=invalidCredentials");
            exit();
        }elseif($checkPwd == true){
            $stmt = $this->connect()->prepare("SELECT * FROM $table WHERE email = ?");

            if(!$stmt->execute(array($email))) {
                $stmt = null;
                $_SESSION['form-error'] = "Critical error, Contact support";
                header("location: ../login.php?error=stmtfailedLoginTHREE");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($table == "client"){
                $_SESSION['user_id'] = $user[0]["client_id"];
                $_SESSION['user_role'] = "client";
            }elseif($table == "mechanic"){
                $_SESSION['user_id'] = $user[0]["mech_id"];
                $_SESSION['user_role'] = "mechanic";
            }
    
        }

        $stmt = null;
    }



    protected function isEmailTaken($email, $table) {
        $sql = "SELECT * FROM " . $table . " WHERE email = ?;";
        $stmt = $this->connect()->prepare($sql);   
        
        if(!$stmt->execute(array($email))) {
            $stmt = null;
            if($table == "mechanic"){
                $_SESSION['form-error'] = "Critical error, Contact support";
                header("location: ../mechanic-signup.php?error=stmtfailedTWO");
            }else{
                $_SESSION['form-error'] = "Critical error, Contact Support";
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


}