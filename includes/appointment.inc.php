<?php

if(isset($_POST["submit"])) {
    //Grabbing the details from form
    $date = $_POST["date"];
    $time = $_POST["time"];
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $description = $_POST["description"];
    $client_id = $_POST["client_id"];
    $mechanic_id = $_POST["mechanic_id"];

    //autoloading necessry files
    include "autoloader.inc.php";

    //Initializing controller
    if($client_id == null){
        header("location: ../view-mechanic.php?error=noClientId");
        exit();
    }

    $appointment = new AppointmentContr($brand, $model, $time, $date, $description, $client_id, $mechanic_id);

    $appointment->bookAppointment();

    header("location: ../client-appointments.php?error=appointmentSet");


}