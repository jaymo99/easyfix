<?php
session_start();

//Grabbing the details from form
$mechanic_service = $_POST["mechanic_service"];
$mechanic_id = $_SESSION["user_id"];

//autoloading necessry files
include "autoloader.inc.php";

//Initializing controller

$uploadService = new MechServicesContr($mechanic_id);
$uploadService->uploadService($mechanic_service);

$_SESSION['form-success'] = "service added";
header("location: ../mechanic-settings-services.php?error=appointmentStatusUpdated");
