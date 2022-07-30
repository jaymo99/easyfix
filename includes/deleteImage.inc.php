<?php

if(isset($_POST["submit"])) {

    //Grabbing the details from form
    $image_id = $_POST["image_id"];
    $image_path = $_POST['image_path'];
    $full_image_path = "../images/" . $image_path;

    if(unlink($full_image_path)){
        //autoloading necessry files
        include "autoloader.inc.php";
        
        //Initializing controller    
        $gallery = new GalleryContr("default", "default");
        $gallery->removeImage($image_id);
        $_SESSION['form-warning'] = "image '" . $image_path . "' deleted";
        header("location: ../mechanic-settings-gallery.php?error=imageDeletedSuccessfully");
    }
}