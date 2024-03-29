<?php

if(isset($_POST["submit"])) {
    //Grabbing the details from form
    $user_category = $_POST["user_category"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    //autoloading necessary files
    include "autoloader.inc.php";

    //Initializing controller
    $signup = new LoginContr($email, $pwd);

    if($user_category == "client"){
        $signup->loginClient();
    }elseif($user_category == "mechanic"){
        $signup->loginMechanic();
    }

    if($user_category == "client"){
        header("location: ../index.php?error=none");
    }elseif($user_category == "mechanic"){
        header("location: ../mechanic-appointments.php?error=none");
    }
    

}