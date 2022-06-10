<?php
    include "includes/index.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>easyfix</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="my-navbar-container">
        <div class="my-navbar">
            
            <div class="my-logo">
                <span>EASYFIX</span>
            </div>
            <ul>
                <li><a href="#">LOG IN</a></li>
                <li><a href="#">SIGN UP</a></li>
            </ul>
        </div>
    </div>
    <div class="body_container">
        <div class="map"> </div>

        <div class="index_page_cards">
            <span>Mechanics Near You</span>
            <div class="mechanic_cards_container">

                <?php for($x=0; $x<sizeof($mechanics); $x++){ ?>
                <div class="mechanic_card">
                    <img src="graphics/mechanic-banner.jpg" alt="">
                    <p> <?php echo $mechanics[$x]['name'] ?> </p>
                    <span> <?php echo $mechanics[$x]['town'] ?> </span>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</body>
</html>