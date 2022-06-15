<?php

if(isset($_POST["submit"])) {

    //Grabbing the details from form
    $status = $_POST["status"];
    $appointment_id = $_POST["appointment_id"];
    
    //autoloading necessry files
    include "autoloader.inc.php";

    //Initializing controller


    echo "Status: " . $status . "<br/>";
    echo "app ID: " . $appointment_id . "<br/>";

    $updateAppointment = new updateAppointmentContr($status, $appointment_id);

    $updateAppointment->updateAppointment();

    header("location: ../mechanic-appointments.php?error=appointmentStatusUpdated");


}