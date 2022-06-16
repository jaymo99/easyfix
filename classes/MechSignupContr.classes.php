<?php

session_start();

class MechSignupContr extends Signup {
    private $businessName;
    private $location;
    private $description;
    private $phoneNumber;
    private $email;
    private $pwd;
    private $confirmPwd;
    
    public function __construct($businessName, $location, $description, $phoneNumber, $email, $pwd, $confirmPwd)
    {
        $this->businessName = $businessName;   
        $this->location = $location;   
        $this->description = $description;   
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;   
        $this->pwd = $pwd;
        $this->confirmPwd = $confirmPwd;
    }
    
    public function signupMechanic() {
        if($this->pwdMatch($this->pwd, $this->confirmPwd) == false) {
            $_SESSION['form-error'] = "Password Mismatch";
            header("location: ../mechanic-signup.php?error=passwordMismatch");
            exit();

        }

        if($this->isEmailTaken($this->email, "mechanic") == true) {
            $_SESSION['form-error'] = "email rejected";
            header("location: ../mechanic-signup.php?error=emailTaken");
            exit();
        }

        $this->setMechanic($this->businessName, $this->location, $this->description, $this->phoneNumber, $this->email, $this->pwd);
    }


}