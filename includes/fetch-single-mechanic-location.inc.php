<?php
session_start();

$mech_id = $_SESSION['mech_id'];

include 'autoloader.inc.php';

//Initializing the controller
$content = new ContentContr();
$mechanicLocation = $content->displayMechanic($mech_id);

echo (json_encode($mechanicLocation));