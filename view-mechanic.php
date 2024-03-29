<?php

session_start();

    //Grab mechanic id
    if(isset($_POST['hiddenInput']) || isset($_SESSION['mech_id'])) {

    if(isset($_POST['hiddenInput'])) {
        $mech_id = $_POST['hiddenInput'];
        $_SESSION['mech_id'] = $_POST['hiddenInput'];
    }

    if(isset($_SESSION['mech_id'])) {
        $mech_id = $_SESSION['mech_id'];
    }
    
    if(isset($_SESSION['user_id'])) {
        $client_id = $_SESSION['user_id'];
    }

    //Including relevant classes
    include "includes/autoloader.inc.php";

    //Initializing the controller
    $content = new ContentContr();
    $mechanic = $content->displayMechanic($mech_id);
    $gallery = $content->displayMechanicGallery($mech_id);
    $mechanic_services = $content->displayMechanicServices($mech_id);
    $form_action = "includes/appointment.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Mechanic</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--  -->
    <script src="JS/jquery-3.6.0.min.js" defer></script>
    <script src="JS/map.js"></script>
    <script src="JS/script.js" defer></script>
    <script src="JS/hamburger.js" defer></script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDteNsv96-8loTY5QU0sjFFjQJGVnJQXPo&callback=initSingleGarageMap">
    </script>
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
                        <?php if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == "mechanic") { ?>
                        <li class="nav-list-item"> <a href="mechanic-settings.php">Settings</a> </li>
                        <?php } ?>
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
            
            <!-- displays error when mechanic tries to book appointment -->
            <?php if(isset($_SESSION['appointment-error'])) { ?>
                <div class="alert alert-danger appointment-error" role="alert">
                    <strong>Attention! </strong>
                    <?php echo $_SESSION['appointment-error'];
                        unset($_SESSION['appointment-error']);
                    ?>
                </div>
            <?php } ?>

            <div id="map"></div>

            <div class="working-hours-flex">
                <div class="mech-content">
                    <h1> <?php echo $mechanic[0]['name']; ?> </h1>
                    <p>Welcome to <?php echo $mechanic[0]['name']; ?>. We're delighted to offer our services to you. In order to get started, you need to sign up for a free account first, then you can book appointments. If you are already signed up, we have provided a form at the bottom of this page, you can schedule an appointment with us. We have also provided our contact details, you can give us a call.</p>
                    <h2>Location</h2>
                    <p> <?php echo $mechanic[0]['description'] ?> </p>
                    <button class="btn btn-sm btn-secondary" onclick="getDirections()">SHOW DIRECTIONS</button>
                    <h2>Contact</h2>
                    <div class="view-mech-contact">
                        <img src="graphics/telephone-call.png" alt="">
                        <span> <?php echo $mechanic[0]['phone'] ?> </span>
                    </div>
                    <div class="view-mech-contact last-mech-contact">
                        <img src="graphics/email.png" alt="">
                        <span> <?php echo $mechanic[0]['email'] ?> </span>
                    </div>
        
                </div>
                <div class="working-hours">
                        <h3>WORKING HOURS</h3>
                        <div class="working-hours-row">
                            <span class="working-day">MON</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">TUE</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">WED</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">THUR</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">FRI</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">SAT</span>
                            <span class="working-time">08:00 - 17:00</span>
                        </div>
                        <div class="working-hours-row">
                            <span class="working-day">SUN</span>
                            <span class="working-time">CLOSED</span>
                        </div>
                </div>
            </div>

            <!-- if mechanic has services set, display them here -->
            <?php if(sizeof($mechanic_services) > 0) { ?>
            <section class="mechanic-services-section">
                <div class="mechanic-services-text">
                    <h2 class="section-heading heading-center" style="margin-bottom: 2rem;">OUR SERVICES</h2>
                    
                    <?php foreach($mechanic_services as $service) { ?>
                    <div class="mechanic-services-item">
                        <img src="graphics/repair.png" alt="">
                        <span><?php echo $service['service']; ?></span>
                    </div>
                    <?php } ?>
                </div>
                <img class="handyman" src="graphics/handyman.jpg" alt="">

            </section>
            <?php } ?>

            <!-- If mechanic has gallery images, display them here -->
            <!-- The webpage has 3 columns for displaying gallery, we need to divide the images into three separate arrays, then display each array in its own column -->
            <?php if(sizeof($gallery) > 0){ 
                $counter = 1;
                $column1 = array();
                $column2 = array();
                $column3 = array();
            ?>

            <div class="mechanic-gallery-container">
                <?php 
                foreach ($gallery as $image) {
                    if($counter == 1){
                        array_push($column1,$image['image_path']);
                        $counter++;
                    }
                    elseif($counter == 2){
                        array_push($column2,$image['image_path']);
                        $counter++;
                    }
                    elseif($counter == 3){
                        array_push($column3,$image['image_path']);
                        $counter = 1;
                    }
                } 

                ?>
                <div class="mechanic-gallery-column">
                    <?php foreach ($column1 as $image) {?>
                    <img src="images/<?php echo $image ?>" alt="">
                    <?php } ?>
                </div>
                <div class="mechanic-gallery-column">
                    <?php foreach ($column2 as $image) {?>
                    <img src="images/<?php echo $image ?>" alt="">
                    <?php } ?>
                </div>
                <div class="mechanic-gallery-column">
                    <?php foreach ($column3 as $image) {?>
                    <img src="images/<?php echo $image ?>" alt="">
                    <?php } ?>
                </div>
            </div>
            <?php } ?>

            <div class="book-appointment-container">
                <div class="book-appointment my-responsive-form">
                    <h2 class="section-heading heading-center">BOOK APPOINTMENT</h2>

                    <?php if(isset($_SESSION['user_id'])) { 
                        if($_SESSION['user_role'] == "mechanic"){ 
                            $form_action = "";
                        ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Attention! </strong>
                            Mechanics cannot book Appointment
                        </div>
                        <?php } ?>
                    <?php } else{ 
                            $form_action = "";
                        ?>
                        <div class="alert alert-info" role="alert">
                            <strong>Attention! </strong>
                            You have to login first!
                        </div>
                    <?php } ?>

                    <form action="<?php echo $form_action; ?>" method="POST">
                        <div class="appointment-form-row">
                            <label for="appointment_date" class="my-placeholder">Appointment Date:</label>
                            <input id="date_picker" type="date" name="date" id="appointment_date" class="form-control" required>
                        </div>
        
                        <div class="appointment-form-row">
                            <label for="appointment_time" class="my-placeholder">Your preferred Time:</label>
                            <input type="time" name="time" id="appointment_time" class="form-control" required>
                        </div>
        
                        <div class="appointment-form-row">
                            <input type="text" name="brand" id="" class="form-control" placeholder="Vehicle Brand" required>
                        </div>
        
                        <div class="appointment-form-row">
                            <input type="text" name="model" id="" class="form-control" placeholder="Vehicle Model" required>
                        </div>
                        <div class="appointment-form-row">
                            <textarea name="description" id="" cols="" rows="5" class="form-control" placeholder="Description of the problem" required></textarea>
                        </div>

                        <!-- hidden input for automatic client and mechanic id -->
                        <?php if(isset($client_id)) { ?>
                        <input type="hidden" name="client_id" id="" value="<?php echo $client_id;?>"> <?php } ?>
                        <?php if(isset($mech_id)) { ?>
                        <input type="hidden" name="mechanic_id" id="" value="<?php echo $mech_id;?>"> <?php } ?>
        
                        <input type="submit" name="submit" value="SUBMIT" class="btn btn-dark btn-width">
                    </form>
                </div>
            </div>
        
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>

    <!-- disable previous dates in date picker -->
    <script src="JS/jquery-3.6.0.min.js"></script>
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#date_picker').attr('min',today);

    </script>
</body>
</html>

<?php 
    } 
    else {
        $_SESSION['form-error'] = "You need to log in first!";
        header("location: login.php?error=fromViewMechanic");
    }
?>