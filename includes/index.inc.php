<?php

//Initializing Controller
include "classes/dbh.classes.php";
include "classes/content.classes.php";
include "classes/contentContr.classes.php";

$content = new ContentContr();

$mechanics = $content->myFunc();
