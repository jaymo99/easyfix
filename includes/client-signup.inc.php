<?php

if(isset($_POST["submit"])) {
    //Grabbing the details from form
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirmPwd = $_POST["confirmPwd"];

    //autoloading necessry files
    include "autoloader.inc.php";

    //Initializing controller
    $signup = new ClientSignupContr($firstName, $middleName, $lastName, $email, $pwd, $confirmPwd);

    $signup->signupClient();

    $_SESSION['form-success'] = "You can now proceed to login";
    header("location: ../login.php?error=none");

}