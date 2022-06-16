<?php 

define('BASEURL', $_SERVER['DOCUMENT_ROOT']);

spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    if(file_exists(__DIR__ . "classes/" . $className . ".classes.php")){
        require_once __DIR__ . "classes/" . $className . ".classes.php";
    }

    if(file_exists(__DIR__ . "../classes/" .$className. ".classes.php")){
        require_once __DIR__ . "../classes/" .$className. ".classes.php";
    }

    // $path = '/classes/';
    // $extension = '.classes.php';
    // $fullPath = $path . $className . $extension;

    // require_once __DIR__ . $path . strtr($className, "\\", "/") . $extension;
}
