<?php 

define('BASEURL', $_SERVER['DOCUMENT_ROOT']);

spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    if(file_exists("classes/" . $className . ".classes.php")){
        include "classes/" . $className . ".classes.php";
    }

    if(file_exists("../classes/" .$className. ".classes.php")){
        include "../classes/" .$className. ".classes.php";
    }

    $path = BASEURL . '/classes/';
    $extension = '.classes.php';
    $fullPath = $path . $className . $extension;

    require $fullPath;
}
