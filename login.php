<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
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
            <ul class="flex-container no-margin">
                <div class="user-loggedOut">
                    <div>
                        <a href="" class="btn btn-sm btn-secondary mybtn-nav">LOG IN</a>
                    </div>
                    <div class="dropdown" data-dropdown>
                        <button class="btn btn-sm btn-secondary mybtn-nav" data-dropdown-button>SIGN UP</button>
                        <div class="dropdown-menu">
                            <a class="btn" href="client-signup.php">Client</a>
                            <a class="btn" href="mechanic-signup.php">Mechanic</a>
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    
    <div class="body_container center">
        <div class="reduced_body">
        
            <div class="mech-register my-responsive-form">
                <p>LOG IN</p>

                <?php if(isset($_SESSION['form-error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                    <strong>Attention! </strong>
                    <?php echo $_SESSION['form-error'];
                        unset($_SESSION['form-error']);
                    ?>
                    </div>
                <?php }elseif(isset($_SESSION['form-success'])) { ?>
                    <div class="alert alert-success" role="alert">
                    <strong>Success! </strong>
                    <?php echo $_SESSION['form-success'];
                        unset($_SESSION['form-success']);
                    ?>
                    </div>
                <?php }?>

                <form action="includes/login.inc.php" method="POST">
                    <select name="user_category" id="" class="form-control" required>
                        <option class="my-placeholder" value="" selected disabled>Choose an Option</option>
                        <option value="mechanic">I'm a Mechanic</option>
                        <option value="client">I'm a Client</option>
                        </select>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email" required>
                    <input type="password" name="pwd" id="" class="form-control" placeholder="Password" required>
                    <input type="submit" name="submit" value="SUBMIT" class="btn btn-dark btn-width">
                </form>
            </div>
        
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>