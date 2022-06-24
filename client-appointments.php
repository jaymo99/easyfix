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
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--  -->
    <script src="JS/script.js" defer></script>
    <script src="JS/hamburger.js" defer></script>

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
                                <a href="client-appointments.php" class="active-link">Appointments</a>
                            <?php } elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "mechanic") { ?>
                                <a href="mechanic-appointments.php">Appointments</a>
                            <?php } ?>
                            </li>
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
            <div class="recent-appointments">
                <h1 class="section-heading">RECENT APPOINTMENTS</h1>
                <div class="appointments-collection">
                    <?php
                     if(sizeof($appointments) < 1){
                    ?>   
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">You Don't have Appointments!</h4>
                            <hr>
                            <p>There's nothing to show here at the moment. Once you book appointments they will be listed here.</p>
                        </div>
                    <?php    
                     }else{
                         foreach($appointments as $appointment) { 
                            //create a unique id for each modal, in order to view dynamic
                            $appointment_modal_id = "modal_" . $appointment['appointment_id'];
                     
                    ?>

                    <!-- Start of Appointment details modal -->
                    <div class="modal fade" id="<?php echo $appointment_modal_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title appointment-modal-title" id="exampleModalLabel">Appointment</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body"> 
                                    <div class="appointment-modal-content">
                                        <h2><?php echo $appointment['name']; ?></h2>
                                        <span><?php echo $appointment['town']; ?></span>
                                        <h3>SCHEDULED : <?php echo $appointment['date']; ?> </h3>
                                        <p> <?php echo $appointment['problem_description']; ?> </p>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Appointment details modal -->

                    <?php
                    // Classes for css styling
                    $appointment_status = null;
                    $appointment_class = null;
                    $appointment_img = null;
                    if($appointment['approval_status'] == 0){
                        $appointment_status = "Pending Approval";
                        $appointment_class = "service-pending";
                        $appointment_img = "graphics/stopwatch.png";
                    }else if($appointment['approval_status'] == 1){
                        $appointment_status = "Service Cancelled";
                        $appointment_class = "service-cancelled";
                        $appointment_img = "graphics/cancel.png";
                    }else if($appointment['approval_status'] == 2){
                        $appointment_status = "Service Approved";
                        $appointment_class = "service-approved";
                        $appointment_img = "graphics/accept.png";
                    }

                    ?>

                    <div class="appointment-card-container <?php echo $appointment_class; ?>">
                        <div class="appointment-card">
                            <div class="appointment-card-title">
                                <span> <?php echo $appointment['name']; ?> </span>
                            </div>
                            <div class="appointment-card-content">
                                <div class="appointment-card-col">
                                    <img src="<?php echo $appointment_img ?>" alt="">
                                    <div class="appointment-card-col2">
                                        <span class="span-status"><?php echo $appointment_status ?></span>
                                        <span class="span-date"> <?php echo $appointment['date']; ?> </span>
                                    </div>
                                </div>
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $appointment_modal_id;?>">DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <?php }}?>

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