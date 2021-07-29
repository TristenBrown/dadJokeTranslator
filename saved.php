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
        <title>Your Saved Jokes</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.min.css">
        <link rel="stylesheet" type="text/css" href="Tlbbf5FinalProject.css">
        <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script src="Tlbbf5FinalProject.js"></script>
        <script src="savedData.js"></script>
    </head>
    <body>
        <div id="savedDiv" class="ui-widget ui-corner-all">
            <h1 id="title" class="ui-widget ui-widget-header">Search for a Specific Joke</h1>
            <div id="savedControls" class="ui-widget">
            <div id="searchDiv">
                <input id="searchInput" class="ui-widget-content ui-corner-all" type="search" autofocus placeholder="Search">
            </div>
            <div id="searchButtons">
                <input id="applyButton" type="button" value="Apply">
                <input id="allButton" type="button" value="All">
            </div>
        </div>
        <div id="savedResults" class="ui-widget ui-widget-content"></div>
        </div>
    </body>
</html>