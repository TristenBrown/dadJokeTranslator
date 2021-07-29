<?php
    //Script to check if a user is logged in
    //Used to determine which navbar should be shown
    if(!session_start()) {
            header("Location: error.php");
            exit;
        }

    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
    
    if ($loggedIn) {
        echo '<div id="navDiv">
        <ul id="navbar" class="ui-widget">
        <li id="home"><a href="index.php">Home</a></li>
        <li id="about"><a href="about.html">About</a></li><li><a href="createOwn.php">Create Joke</a></li>
        <li id="saved"><a href="saved.php">Saved Jokes</a></li>
        <li><a href="SignOut.php">Sign Out</a></li>
        </ul>
        </div>';
    }
    else{
        echo '<div id="navDiv">
            <ul id="navbar" class="ui-widget">
            <li id="home"><a href="index.php">Home</a></li>
            <li id="about"><a href="about.html">About</a></li>
            <li id="signIn"><a href="SignInForm.php">Sign In</a></li>
            <li id="create"><a href="CreateAccount.php">Create An Account</a></li>
            </ul>
            </div>';
    }
?>