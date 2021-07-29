<?php
//I got this code from lecture but have heavily modified it
if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	
	$loggedIn = $_SESSION['loggedin'];

// Require the credentials
        require_once 'db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            echo "error";
            exit;
        }
        
        $loggedIn = $mysqli->real_escape_string($loggedIn);

        if($_POST['action'] == "all"){
            // Build query
            $query = "select userSaveData from saveData WHERE username = '$loggedIn'";
            $mysqliResult = $mysqli->query($query);
		
            // If there was a result...
            if ($mysqliResult) {
                $outPut = $mysqliResult->fetch_array;
                echo $outPut;
                //I got this code that loops through the results of the mysqli query from https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
                while ($outPut = $mysqliResult->fetch_assoc()) {
                echo '<p class="savedJoke">';
                echo $outPut['userSaveData'];
                echo "</p><hr>";
                }
                $mysqliResult->free();
                $mysqliResult->close();
                $mysqli->close();

            }
            else {
                echo "error";
                exit;
            }
        }
        else if($_POST['action'] == "search"){
            $q = $_POST['q'];
            $q = $mysqli->real_escape_string($q);
            $query = "SELECT * FROM saveData WHERE userSaveData LIKE '%$q%'";
            $mysqliResult = $mysqli->query($query);
            // If there was a result...
            if ($mysqliResult) {
                //I got this code that loops through the results of the mysqli query from https://www.php.net/manual/en/mysqli-result.fetch-assoc.php
                $outPut = $mysqliResult->fetch_array;
                while ($outPut = $mysqliResult->fetch_assoc()) {
                if($loggedIn == $outPut['username']){
                     echo '<p class="savedJoke">';
                    echo $outPut['userSaveData'];
                    echo "</p><hr>";
                }
                }
                $mysqliResult->free();
                $mysqliResult->close();
                $mysqli->close();

            }
            else {
                echo "error";
                exit;
            }
        }
		
       
?>