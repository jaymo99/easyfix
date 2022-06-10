<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
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
                    <a href="" class="btn btn-sm btn-secondary mybtn-nav">LOG IN</a>
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
    
    <div class="body_container center">
        <div class="mech-register my-responsive-form">
            <p>LOG IN</p>
            <form action="">
                <select name="" id="" class="form-control" required>
                    <option class="my-placeholder" value="" selected disabled>Choose an Option</option>
                    <option value="">I'm a Mechanic</option>
                    <option value="">I'm a Client</option>
                    </select>
                <input type="email" name="" id="" class="form-control" placeholder="Email" required>
                <input type="password" name="" id="" class="form-control" placeholder="Password" required>
                <input type="submit" value="SUBMIT" class="btn btn-dark btn-width">
            </form>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>