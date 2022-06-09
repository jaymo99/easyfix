<?php 

class ClientSignupContr extends Signup {

    private $firstName;    
    private $middleName;    
    private $lastName;    
    private $email;    
    private $pwd;    
    private $confirmPwd;
    
    public function __construct($firstName, $middleName, $lastName, $email, $pwd, $confirmPwd) {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->confirmPwd = $confirmPwd;
    }

    public function signupClient() {
        if($this->pwdMatch($this->pwd, $this->confirmPwd) == false) {
            header("location: ../client-signup.php?error=passwordMismatch");
            exit();

        }

        if($this->emailTakenCheck($this->email, "client") == true) {
            header("location: ../client-signup.php?error=emailTaken");
            exit();
        }

        $this->setClient($this->firstName, $this->middleName, $this->lastName, $this->email, $this->pwd);
    }


    
}