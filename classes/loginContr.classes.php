<?php

class LoginContr extends Login {

    private $email;    
    private $pwd;    
    
    public function __construct($email, $pwd) {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginClient() {
        if($this->isEmailTaken($this->email, "client") == false) {
            $_SESSION['form_error'] = "Invalid credentials";
            header("location: ../login.php?error=invalidCredentials");
            exit();
        }

        $this->getClient($this->email, $this->pwd);
    }


    
}