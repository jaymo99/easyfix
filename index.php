<?php
    session_start();
    //Including relevant classes
    include "includes/autoloader.inc.php";

    //Initializing the controller
    $content = new ContentContr();
    $mechanics = $content->displayAllMechanics();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>easyfix</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="JS/script.js" defer></script>
</head>
<body>
    <div class="my-navbar-container">
        <div class="my-navbar">
            
            <div class="my-logo">
                <a href=""><span>EASYFIX</span></a>
            </div>
            <ul>
                <?php if(isset($_SESSION['user_id'])) { ?>

                    <div class="user-loggedIn">
                        <li class="nav-list-item"> <a href="" class="active-link">Home</a> </li>
                        <li class="nav-list-item"> <a href="">Appointments</a> </li>
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
            <div class="map"> </div>
            <div class="index_page_cards">
                <span>Available Mechanics</span>
                <div class="mechanic_cards_container">
                    <!-- form for setting passing mech_id to php -->
                    <form action="view-mechanic.php" method="POST" class="dontDisplay" id="hiddenForm">
                        <input type="hidden" name="hiddenInput" id="hiddenInput">
                    </form>
                        <!-- loop through mechanics array and display cards -->
                        <?php for($x=0; $x<sizeof($mechanics); $x++){ ?>
                            <div class="mechanic_card" id=<?php echo $mechanics[$x]['mech_id']?>>
                                <img src="graphics/mechanic-banner.jpg" alt="">
                                <p> <?php echo $mechanics[$x]['name'] ?> </p>
                                <span> <?php echo $mechanics[$x]['town'] ?> </span>
                            </div>
                        <?php } ?>
                
                </div>
            </div>
        </div>
    </div>
</body>
</html>