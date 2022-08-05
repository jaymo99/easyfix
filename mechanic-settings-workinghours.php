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

    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--  -->
    <script src="bootstrap/js/bootstrap.bundle.min.js" defer></script>
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
                        <li class="nav-item sidebar-item">
                            <img class="sidebar-icon" src="graphics/gallery.png" alt="">
                            <a href="mechanic-settings-gallery.php" class="nav-link sidebar-link">Gallery</a>
                        </li>
                        <li class="nav-item sidebar-item">
                            <img class="sidebar-icon" src="graphics/repair.png" alt="">
                            <a href="mechanic-settings-services.php" class="nav-link sidebar-link">Services</a>
                        </li>
                        <li class="nav-item sidebar-item active-link">
                            <img class="sidebar-icon" src="graphics/working hours.png" alt="">
                            <a href="#" class="nav-link sidebar-link">Working Hours</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--  -->

            <form action="includes/working-hours.inc.php" method="post">
                <div class="appointment-form-row">
                    <select name="working_day" id="" class="form-select" required>
                        <option value="" selected disabled>Choose day of the week</option>
                        <option value="1">Sunday</option>
                        <option value="2">Monday</option>
                        <option value="3">Tuesday</option>
                        <option value="4">Wednesday</option>
                        <option value="5">Thursday</option>
                        <option value="6">Friday</option>
                        <option value="7">Saturday</option>
                    </select>
                </div>

                <div class="appointment-form-row">
                    <label for="opening_time">Opening Time</label>
                    <input class="form-control" type="time" name="opening_time" id="opening_time" required>
                </div>

                <div class="appointment-form-row">
                    <label for="closing_time">Closing Time</label>
                    <input class="form-control" type="time" name="closing_time" id="closing_time" required>
                </div>
                <input type="submit" name="submit" value="SUBMIT" class="btn btn-dark btn-width">
            </form>
        </div>
    </div>

    <!-- <script src="bootstrap/js/bootstrap.bundle.js"></script> -->
</body>
</html>