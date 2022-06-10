<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Mechanic</title>
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
                <li><a href="#">LOG IN</a></li>
                <li><a href="#">SIGN UP</a></li>
            </ul>
        </div>
    </div>
    
    <div class="body_container">
        <div class="mech-banner"> 
            <img src="graphics/mechanic-banner.jpg" alt="">
        </div>

        <div class="working-hours-flex">

            <div class="mech-content">
                <h1>Mr. Handyman & sons</h1>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam urna quis ipsum varius ultricies. Vivamus diam turpis, varius sit amet vulputate sit amet, pretium id libero. Fusce dignissim leo ligula, vel lacinia enim posuere eget. Mauris gravida neque in lacus auctor congue. Fusce scelerisque sit amet dui in convallis. </p>

                <h2>Location</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec aliquam urna quis ipsum varius ultricies. Vivamus diam turpis, varius sit amet vulputate.</p>

                <button class="btn btn-dark">SEE IN THE MAP</button>

                <h2>Contact</h2>

                <div class="view-mech-contact">
                    <img src="graphics/telephone-call.png" alt="">
                    <span>+254716923990</span>
                </div>
                <div class="view-mech-contact last-mech-contact">
                    <img src="graphics/email.png" alt="">
                    <span>email@example.com</span>
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

        <div class="book-appointment-container">
            <div class="book-appointment my-responsive-form">
                <h2 class="section-heading heading-center">BOOK APPOINTMENT</h2>
                <form action="">
                    <div class="appointment-form-row">
                        <label for="appointment_date" class="my-placeholder">Appointment Date:</label>
                        <input type="date" name="" id="appointment_date" class="form-control" required>
                    </div>
    
                    <div class="appointment-form-row">
                        <label for="appointment_time" class="my-placeholder">Your preferred Time:</label>
                        <input type="time" name="" id="appointment_time" class="form-control" required>
                    </div>
    
                    <div class="appointment-form-row">
                        <input type="text" name="" id="" class="form-control" placeholder="Vehicle Brand" required>
                    </div>
    
                    <div class="appointment-form-row">
                        <input type="text" name="" id="" class="form-control" placeholder="Vehicle Model" required>
                    </div>
                    <div class="appointment-form-row">
                        <textarea name="" id="" cols="" rows="5" class="form-control" placeholder="Description of the problem" required></textarea>                    
                    </div>
    
                    <input type="submit" value="SUBMIT" class="btn btn-dark btn-width">
                </form>
            </div>
        </div>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>