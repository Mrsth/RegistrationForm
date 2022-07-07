<?php
session_start();
?>
<h1>
    Welcome to dashboard
    <?php
    // to change a session variable, just overwrite it
    print_r($_SESSION['email']);
    ?>
</h1>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>