<?php
    // removes all session information 
    session_destroy();

    // redirect user back to login page
    header('Location: login.php');
?>