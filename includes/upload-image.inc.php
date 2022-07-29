<?php
session_start();

// if($_FILES["file"]["error"] != 4) {
//     //stands for any kind of errors happen during the uploading
//     $_SESSION['form-error'] = "No file selected for upload";
//     header("location: ../mechanic-settings-gallery.php?error=noFileSelected");
//     exit();
// } 

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    $_SESSION['form-error'] = "File is not an image";
    header("location: ../mechanic-settings-gallery.php?error=fileIsNotImage");
    exit();
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $_SESSION['form-error'] = "File already exists";
  header("location: ../mechanic-settings-gallery.php?error=fileAlreadyExists");
  exit();
  $uploadOk = 0;
}

// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//   echo "Sorry, your file is too large.";
//   $uploadOk = 0;
// }

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $_SESSION['form-error'] = "only JPG, JPEG, PNG $ GIF files are allowed";
  header("location: ../mechanic-settings-gallery.php?error=wrongFileFormat");
  exit();
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  $_SESSION['form-error'] = "your file was not uploaded";
  header("location: ../mechanic-settings-gallery.php?error=unknownError");
  exit();
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    // if file is uploaded successfuly, add path to Database

    //autoloading necessary files
    include "autoloader.inc.php";

    //Initializing controller
    $imagePath = basename( $_FILES["fileToUpload"]["name"]);
    $mech_id = $_SESSION['user_id'];
    $gallery = new GalleryContr($imagePath, $mech_id);
    $gallery->uploadImage();

    $_SESSION['form-success'] = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("location: ../mechanic-settings-gallery.php?error=success");
    exit();
  } else {
    echo "Sorry, there was an error uploading your file.";
    $_SESSION['form-error'] = "there was an error uploading your file";
    header("location: ../mechanic-settings-gallery.php?error=unknownError");
    exit();
  }
}
?>