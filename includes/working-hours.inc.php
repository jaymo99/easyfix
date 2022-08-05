<?php

//Grabbing the details from form
$working_day = $_POST["working_day"];
$opening_time = $_POST["opening_time"];
$closing_time = $_POST["closing_time"];

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
