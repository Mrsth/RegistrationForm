<?php
session_start();
// unset($_SESSION['email']);
// unset($_SESSION['pass']);
// $_SESSION['flag'] = 0;
echo 'You have been logged out. <a href="index.php">Go back</a>';


// remove all session variables
session_unset();

// destroy the session
session_destroy();

//echo $_SESSION['flag'] . $_SESSION['email'];
