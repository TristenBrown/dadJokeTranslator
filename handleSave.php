<?php
    //modified from lecture code
    if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	
	$loggedIn = $_SESSION['loggedin'];

    $info = $_POST['info'];
// Require the credentials
        require_once 'db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            header("Location: error.php");
            exit;
        }
        
        // http://php.net/manual/en/mysqli.real-escape-string.php
        $loggedIn = $mysqli->real_escape_string($loggedIn);
        $info = $mysqli->real_escape_string($info);
        
        // Build query
		$query = "INSERT into saveData (username, userSaveData) values ('$loggedIn', '$info')";
		
        
		// Run the query
		$mysqliResult = $mysqli->query($query);
		
        // If there was a result...
        if ($mysqliResult) {
            
            $mysqli->close();

        }
        else {
          header("Location: error.php");
          exit;
        }
?>