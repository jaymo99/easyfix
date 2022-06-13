<?php
session_start();

class LoginContr extends Login {

    private $email;    
    private $pwd;    
    
    public function __construct($email, $pwd) {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginClient() {
        if($this->isEmailTaken($this->email, "client") == false) {
            $_SESSION['form-error'] = "Invalid Client credentials";
            header("location: ../login.php?error=invalidCredentials");
            exit();
        }

        $this->getClient($this->email, $this->pwd, "client");
    }

    public function loginMechanic() {
        if($this->isEmailTaken($this->email, "mechanic") == false) {
            $_SESSION['form-error'] = "Invalid Mechanic credentials";
            header("location: ../login.php?error=invalidCredentials");
            exit();
        }

        $this->getClient($this->email, $this->pwd, "mechanic");
    }


    
}