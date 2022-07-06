<?php

include 'autoloader.inc.php';

//Initializing the controller
$content = new ContentContr();
$locations = $content->displayMechanicLocations();

echo (json_encode($locations));