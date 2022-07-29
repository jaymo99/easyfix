<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic settings</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--  -->
    <script src="bootstrap/js/bootstrap.min.js" defer></script>
    <script src="JS/script.js" defer></script>
    <script src="JS/hamburger.js" defer></script>
    <script src="JS/map.js" defer></script>
    
</head>
<body>
    <div class="my-navbar-container">
        <div class="my-navbar">
            
            <div class="my-logo">
                <a href="index.php"><span>EASYFIX</span></a>
            </div>
            <?php if(isset($_SESSION['user_id'])) { ?>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

                <ul class="my-menu">
                    <div class="user-loggedIn">
                        <li class="nav-list-item"> <a href="index.php">Home</a> </li>
                        <li class="nav-list-item">
                            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client") { ?>
                                <a href="client-appointments.php">Appointments</a>
                            <?php } elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "mechanic") { ?>
                                <a href="mechanic-appointments.php">Appointments</a>
                            <?php } ?>
                            </li>
                        <li class="nav-list-item"> <a href="#" class="active-link">Settings</a> </li>
                        <li class="logout-btn">
                            <a href="includes/logout.inc.php" class="btn btn-sm btn-secondary mybtn-nav btn-hamburger">LOG OUT</a>
                            <!-- <img src="graphics/user.png" class="my-user-profile" alt="user-profile"> -->
                        </li>
                    </div>
                <?php }else{ ?>

                <div class="user-loggedOut">
                    <div>
                        <a href="login.php" class="btn btn-sm btn-secondary mybtn-nav">LOG IN</a>
                    </div>
                    <div class="dropdown" data-dropdown>
                        <button class="btn btn-sm btn-secondary mybtn-nav" data-dropdown-button>SIGN UP</button>
                        <div class="dropdown-menu">
                            <a class="btn" href="client-signup.php">Client</a>
                            <a class="btn" href="mechanic-signup.php">Mechanic</a>
                        </div>
                    </div>
                </div>
                <?php  } ?>

            </ul>
        </div>
    </div>

    <div class="body_container">
        <div class="reduced_body">

            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#settingsOffcanvas" aria-controls="offcanvasExample" style="align-self: flex-start; margin: .5rem 0;">
            MORE SETTINGS
            </button>

            <!--  -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="settingsOffcanvas" aria-labelledby="offcanvasLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasLabel"></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" style="background-color: #E2B80A;">
                    <ul class="navbar-nav">
                        <li class="nav-item sidebar-item">
                            <img class="sidebar-icon" src="graphics/map.png" alt="">
                            <a href="mechanic-settings.php" class="nav-link sidebar-link">Map</a>
                        </li>
                        <li class="nav-item sidebar-item active-link">
                            <img class="sidebar-icon" src="graphics/gallery.png" alt="">
                            <a href="#" class="nav-link sidebar-link">Gallery</a>
                        </li>
                        <li class="nav-item sidebar-item">
                            <img class="sidebar-icon" src="graphics/working hours.png" alt="">
                            <a href="mechanic-settings-workinghours.php" class="nav-link sidebar-link">Working Hours</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  -->

            <form class="mechanic-settings-form" action="includes/upload-image.inc.php" method="post" enctype="multipart/form-data">
                <table id="upload-image-table" cellspacing="30px">
                    <tr>
                        <td>Select image to upload:</td>
                        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
                        <td rowspan="2">
                            <?php if(isset($_SESSION['form-error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="display: inline-block">
                                <strong>Error! </strong>
                                <?php echo $_SESSION['form-error']; unset($_SESSION['form-error']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>

                            <?php if(isset($_SESSION['form-success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="display: inline-block">
                                <strong>Success! </strong>
                                <?php echo $_SESSION['form-success']; unset($_SESSION['form-success']); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-sm btn-success" type="submit" value="Upload Image" name="submit">
                        </td>
                    </tr>
                </table>
                
            </form>
        </div>
    </div>

    <!-- <script src="bootstrap/js/bootstrap.bundle.js"></script> -->
    
</body>
</html>