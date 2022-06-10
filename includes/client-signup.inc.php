<?php

if(isset($_POST["submit"])) {
    //Grabbing the details from form
    $firstName = $_POST["firstName"];
    $middleName = $_POST["middleName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirmPwd = $_POST["confirmPwd"];

    //Initializing controller
    // include "../classes/dbh.classes.php";
    // include "../classes/signup.classes.php";
    // include "../classes/clientSignupContr.classes.php";
    include "autoloader.inc.php";

    $signup = new ClientSignupContr($firstName, $middleName, $lastName, $email, $pwd, $confirmPwd);

    $signup->signupClient();

    header("location: ../client-signup.php?error=none");

}