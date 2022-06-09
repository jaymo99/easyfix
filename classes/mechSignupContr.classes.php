<?php

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
            header("location: ../mechanic-signup.php?error=passwordMismatch");
            exit();

        }

        if($this->emailTakenCheck($this->email, "mechanic") == true) {
            header("location: ../mechanic-signup.php?error=emailTaken");
            exit();
        }

        $this->setMechanic($this->businessName, $this->location, $this->description, $this->phoneNumber, $this->email, $this->pwd);
    }


}