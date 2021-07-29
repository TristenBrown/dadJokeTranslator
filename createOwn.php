<?php
// This php code is adapted from code created by Professor Wergeles for CS2830 at the University of Missouri
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Your Own Joke</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="Tlbbf5FinalProject.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="Tlbbf5FinalProject.js"></script>
        <script src="createOwn.js"></script>
    </head>
    <body>
        <div id="centerPage" class="ui-widget">
            <h1 id="title" class="ui-widget-header">Create Your Own Joke</h1>
            <div id="jokeContainer" class="ui-widget ui-corner-all ui-widget-content">
                <textArea id="createdJoke" class="ui-widget ui-corner-all ui-widget-content" autofocus placeholder="Your joke here"></textArea>
            </div>
            <input id="save" type="button" value="Save">
        </div>
    </body>
</html>