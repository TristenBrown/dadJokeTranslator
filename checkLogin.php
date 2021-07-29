<?php
    //Script to check if a user is logged in
    //Used to determine if logged in elements should be shown
    if(!session_start()) {
            header("Location: error.php");
            exit;
        }

    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    if ($loggedIn) {
        echo 'true';
    }
    else{
        echo 'false';
    }
?>