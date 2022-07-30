<?php
session_start();

//Grabbing the details from form
$service_id = $_POST["service_id"];
$mechanic_id = $_SESSION['user_id'];

//autoloading necessry files
include "autoloader.inc.php";

//Initializing controller
$deleteService = new MechServicesContr($mechanic_id);
$deleteService->removeService($service_id);

$_SESSION['form-warning'] = "service removed";
header("location: ../mechanic-settings-services.php?error=serviceSuccessfullyRemoved");