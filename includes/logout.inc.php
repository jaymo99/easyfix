<?php

session_start();
unset($_SESSION['user_id']);

//Go back to front page
header("location: ../index.php?error=loggedOut");