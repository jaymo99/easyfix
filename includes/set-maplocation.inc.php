<?php
session_start();

$json = file_get_contents('php://input');
$data = json_decode($json);


include "autoloader.inc.php";
    
$saveLocation = new MechLocationContr($data->lat, $data->lng, 1);

//Running error handlers and user signup
$saveLocation->updateMechanicLocation();

echo "Check Db in mech_id = 1";