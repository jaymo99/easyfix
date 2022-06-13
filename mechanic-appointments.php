<?php
    session_start();

    include "includes/autoloader.inc.php";
    
    //Initializing the controller
    $content = new ContentContr();
    $appointments = $content->displayMechanicAppointments($_SESSION['user_id']);
    
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
                        <li class="nav-list-item"> <a href="index.php">Home</a> </li>
                        <li class="nav-list-item">
                            <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "client") { ?>
                                <a href="client-appointments.php">Appointments</a>
                            <?php } elseif(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "mechanic") { ?>
                                <a href="mechanic-appointments.php" class="active-link">Appointments</a>
                            <?php } ?>
                            </li>
                        <li class="nav-list-item"> <a href="">About</a> </li>
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
                <h1 class="section-heading">UPCOMING APPOINTMENTS</h1>
                <div class="appointments-collection">
                    <?php
                     if(sizeof($appointments) < 1){
                    ?>   
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">You Don't have Appointments!</h4>
                            <hr>
                            <p>There's nothing to show here at the moment. Once Clients book appointments they will be listed here.</p>
                        </div>
                    <?php    
                     }else{
                         foreach($appointments as $appointment) { 
                            //create a unique id for each modal, in order to view dynamic
                            $appointment_modal_id = "modal_" . $appointment['appointment_id'];

                                if($appointment['approval_status'] == 0) {
                     
                    ?>
                    <!-- Start of Appointment details modal -->
                    <div class="modal fade" id="<?php echo $appointment_modal_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title appointment-modal-title" id="exampleModalLabel">Pending Approval</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                
                                <div class="modal-body"> 
                                    <div class="appointment-modal-content">
                                        <h2><?php echo $appointment['f_name']." ".$appointment['m_name']." ".$appointment['l_name']; ?></h2>
                                        <span><?php echo $appointment['vehicle_brand']." ".$appointment['vehicle_model']; ?></span>
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

                    <div class="appointment-card-container <?php echo"service-pending"; } ?>">
                        <div class="appointment-card">
                            <div class="mech-appointment-title">
                                <span class="appointment-title-one"> <?php echo $appointment['f_name']." ".$appointment['m_name']." ".$appointment['l_name']; ?> </span>
                                <span class="appointment-title-two"> <?php echo $appointment['vehicle_brand']." ".$appointment['vehicle_model']; ?> </span>
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
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#<?php echo $appointment_modal_id;?>">DETAILS</button>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>



                </div>
            </div>
        
            <div class="recent-appointments">
                <h1 class="section-heading">PENDING APPROVAL</h1>
                <div class="appointments-collection">
                    <div class="appointment-card-container service-pending">
                        <div class="appointment-card">
                            <div class="mech-appointment-title">
                                <span class="appointment-title-one">Andrew Robertson</span>
                                <span class="appointment-title-two">Honda Civic</span>
                            </div>
                            <div class="appointment-card-content">
                                <div class="appointment-card-col">
                                    <img src="graphics/stopwatch.png" alt="">
                                    <div class="appointment-card-col2">
                                        <span class="span-status">15-Feb-2022</span>
                                        <span class="span-date">08:00 HRS</span>
                                    </div>
                                </div>
                                <button class="btn btn-dark btn-sm">DETAILS</button>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>