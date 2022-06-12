<?php
    session_start();

    include "includes/autoloader.inc.php";
    
    //Initializing the controller
    $content = new ContentContr();
    $appointments = $content->displayClientAppointments($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My appointments</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="my-navbar-container">
        <div class="my-navbar">
            
            <div class="my-logo">
                <a href="index.php"><span>EASYFIX</span></a>
            </div>
            <ul>
                <?php if(isset($_SESSION['user_id'])) { ?>

                    <div class="user-loggedIn">
                        <li class="nav-list-item"> <a href="index.php" class="">Home</a> </li>
                        <li class="nav-list-item"> <a href="client-appointments.php" class="active-link"s>Appointments</a> </li>
                        <li class="nav-list-item"> <a href="index.php">About</a> </li>
                        <li class="logout-btn">
                            <a href="includes/logout.inc.php" class="btn btn-sm btn-secondary mybtn-nav">LOG OUT</a>
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
            <div class="recent-appointments">
                <h1 class="section-heading">RECENT APPOINTMENTS</h1>
                <div class="appointments-collection">

                    <?php foreach($appointments as $appointment) { 
                            if($appointment['approval_status'] == 0) {

                    ?>
                    <div class="appointment-card-container <?php echo"service-pending"; } ?>">
                        <div class="appointment-card">
                            <div class="appointment-card-title">
                                <span> <?php echo $appointment['name']; ?> </span>
                            </div>
                            <div class="appointment-card-content">
                                <div class="appointment-card-col">
                                    <?php if($appointment['approval_status'] == 0) { ?>
                                    <img src="graphics/stopwatch.png" alt="">
                                    <?php } ?>
                                    <div class="appointment-card-col2">
                                        <?php if($appointment['approval_status'] == 0) { ?>
                                        <span class="span-status">Pending Approval</span>
                                        <?php } ?>
                                        <span class="span-date"> <?php echo $appointment['date']; ?> </span>
                                    </div>
                                </div>
                                <button class="btn btn-dark btn-sm">DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <?php } ?>



                </div>
            </div>
        
            <!-- <div class="recent-appointments">
                <h1 class="section-heading">HISTORY</h1>
                <div class="appointments-collection">
                    <div class="appointment-card-container service-pending">
                        <div class="appointment-card">
                            <div class="appointment-card-title">
                                <span>Urban Motors General Servicing and Repair Center</span>
                            </div>
                            <div class="appointment-card-content">
                                <div class="appointment-card-col">
                                    <img src="graphics/stopwatch.png" alt="">
                                    <div class="appointment-card-col2">
                                        <span class="span-status">Pending Approval</span>
                                        <span class="span-date">15-Feb-2022</span>
                                    </div>
                                </div>
                                <button class="btn btn-dark btn-sm">DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <div class="appointment-card-container service-cancelled">
                        <div class="appointment-card">
                            <div class="appointment-card-title">
                                <span>Urban Motors General Servicing and Repair Center</span>
                            </div>
                            <div class="appointment-card-content">
                                <div class="appointment-card-col">
                                    <img src="graphics/cancel.png" alt="">
                                    <div class="appointment-card-col2">
                                        <span class="span-status">Service Cancelled</span>
                                        <span class="span-date">21-Jan-2022</span>
                                    </div>
                                </div>
                                <button class="btn btn-dark btn-sm">DETAILS</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>