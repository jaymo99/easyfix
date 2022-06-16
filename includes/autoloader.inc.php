<?php 

spl_autoload_register('myAutoloader');

function myAutoloader($className) {
    if(file_exists("classes/" . $className . ".classes.php")){
        include "classes/" . $className . ".classes.php";
    }

    if(file_exists("../classes/" .$className. ".classes.php")){
        include "../classes/" .$className. ".classes.php";
    }

}
