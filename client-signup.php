<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client sign up</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
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
    
    <div class="body_container center">
        <div class="mech-register my-responsive-form">
            <p>Register as a Client</p>
            <form action="includes/client-signup.inc.php" method="post">
                <input type="text" name="firstName" id="" class="form-control" placeholder="First Name">
                <input type="text" name="middleName" id="" class="form-control" placeholder="Middle Name">
                <input type="text" name="lastName" id="" class="form-control" placeholder="Last Name">
                <input type="email" name="email" id="" class="form-control" placeholder="Email">
                <input type="password" name="pwd" id="" class="form-control" placeholder="Password">
                <input type="password" name="confirmPwd" id="" class="form-control" placeholder="Confirm password">
                <input type="submit" name="submit" value="SUBMIT" class="btn btn-dark btn-width">
            </form>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>