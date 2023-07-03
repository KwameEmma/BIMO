<?php
//Preventing user from going back after logging out
    session_start();

    session_destroy();
    
    // Redirect to the login page
    header("Location: index.html");

?>
