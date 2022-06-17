<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mechanic sign up</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--  -->
    <script src="JS/script.js" defer></script>
</head>
<body>
    <div class="my-navbar-container">
        <div class="my-navbar">
            
            <div class="my-logo">
                <a href="index.php"><span>EASYFIX</span></a>
            </div>
            <ul>
                <div>
                    <a href="login.php" class="btn btn-sm btn-secondary mybtn-nav">LOG IN</a>
                </div>
                <div class="dropdown" data-dropdown>
                    <button class="btn btn-sm btn-secondary mybtn-nav" data-dropdown-button>SIGN UP</button>
                    <div class="dropdown-menu">
                        <a class="btn" href="client-signup.php">Client</a>
                        <a class="btn" href="">Mechanic</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>

    <div class="body_container">
        <div class="reduced_body">
        
            <div class="mech-register my-responsive-form">
                <p>Register as a Mechanic</p>
                <?php if(isset($_SESSION['form-error'])) {?>
                <div class="alert alert-danger" role="alert">
                    <strong>Attention! </strong>
                    <?php echo $_SESSION['form-error']; unset($_SESSION['form-error']) ?>
                </div>
                <?php  }  ?>
                <form action="includes/mechanic-signup.inc.php" method="post">
                    <input type="text" name="businessName" id="" class="form-control" placeholder="Your Business Name" required>
                    <input type="text" name="location" id="" class="form-control" placeholder="Location (Town)" required>
                    <textarea name="description" id="" cols="" rows="3" class="form-control" placeholder="Describe where the Business is found" required></textarea>
                    <input type="text" name="phoneNumber" id="" class="form-control" placeholder="Phone Number" required>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email" required>
                    <input type="password" name="pwd" id="" class="form-control" placeholder="Password" required>
                    <input type="password" name="confirmPwd" id="" class="form-control" placeholder="Confirm password" required>
                    <input type="submit" name="submit" value="SUBMIT" class="btn btn-dark btn-width">
                </form>
            </div>
        
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>