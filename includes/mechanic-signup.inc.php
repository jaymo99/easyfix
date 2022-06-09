<?php

if(isset($_POST["submit"])){

    //Grabbing the data
    $businessName = $_POST["businessName"];
    $location = $_POST["location"];
    $description = $_POST["description"];
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirmPwd = $_POST["confirmPwd"];

    //Instantiate signupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";   
    include "../classes/mechSignupContr.classes.php";
    $signup = new MechSignupContr($businessName, $location, $description, $phoneNumber, $email, $pwd, $confirmPwd);
    
    //Running error handlers and user signup
    $signup->signupMechanic();
    
    //Going back to front page 
    header("location: ../mechanic-signup.php?error=none");
}