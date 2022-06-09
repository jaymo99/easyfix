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
    
    public function signupUser() {
        if($this->pwdMatch() == false) {
            header("location: ../mechanic-signup.php?error=passwordMismatch");
            exit();

        }

        if($this->emailTakenCheck() == true) {
            header("location: ../mechanic-signup.php?error=emailTaken");
            exit();
        }

        $this->setMechanic($this->businessName, $this->location, $this->description, $this->phoneNumber, $this->email, $this->pwd);
    }

    private function pwdMatch() {
        $result = null;   //boolean value true or false
        if($this->pwd !== $this->confirmPwd){
            $result = false;
        }else{
            $result = true;
        }
        return $result;
    }

    private function emailTakenCheck() {
        $result = null;   //boolean value true or false
        if($this->checkUser($this->email, "mechanic")){
            $result = true;
        }else{
            $result = false;
        }
        return $result;
    }

}