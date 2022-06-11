<?php
    //Including relevant classes
    include "includes/autoloader.inc.php";

    //Initializing the controller
    $content = new ContentContr();
    $mechanics = $content->myFunc();
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
            </ul>
        </div>
    </div>
    <div class="body_container">
        <div class="map"> </div>

        <div class="index_page_cards">
            <span>Available Mechanics</span>
            <div class="mechanic_cards_container">
            <!-- form for setting passing mech_id to php -->
            <form action="hidden.php" method="POST" class="dontDisplay" id="hiddenForm">
                <input type="hidden" name="hiddenInput" id="hiddenInput">
            </form>

                <!-- loop through mechanics array and display cards -->
                <?php for($x=0; $x<sizeof($mechanics); $x++){ ?>
                    <div class="mechanic_card" id=<?php echo $mechanics[$x]['mech_id']?>>
                        <img src="graphics/mechanic-banner.jpg" alt="">
                        <p> <?php echo $mechanics[$x]['name'] ." (". $mechanics[$x]['mech_id'] .")" ?> </p>
                        <span> <?php echo $mechanics[$x]['town'] ?> </span>
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</body>
</html>