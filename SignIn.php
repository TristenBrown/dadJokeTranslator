<?php
    // Much of this code is adapted from lecture code

	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: index.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'Sign In') {
		handle_login();
	} else if($action == 'Create An Account'){
		createAccount();
	} else {
		resetForm();
	}
	
	function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
	
		// Require the credentials
        require_once 'db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "SignInForm.php";
            exit;
        }
        
        // http://php.net/manual/en/mysqli.real-escape-string.php
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        //more secure password storing for website
        $password = sha1($password); 
        
        // Build query
		$query = "SELECT id FROM users WHERE username = '$username' AND userPassword = '$password'";
		
        
		// Run the query
		$mysqliResult = $mysqli->query($query);
		
        // If there was a result...
        if ($mysqliResult) {
            // How many records were returned?
            $match = $mysqliResult->num_rows;

            // Close the results
            $mysqliResult->close();
            // Close the DB connection
            $mysqli->close();


            // If there was a match, login
  		    if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                header("Location: index.php");
                exit;
            }
            else {
                $error = 'Error: Incorrect username or password';
                require "SignInForm.php";
                exit;
            }
        }
        // Else, there was no result
        else {
          $error = 'Login Error: Please contact the system administrator.';
          require "SignInForm.php";
          exit;
        }
	}
	
    function createAccount(){
        $username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
		$confirmPassword = empty($_POST['confirmPassword']) ? '' : $_POST['confirmPassword'];
        
        if(strcmp($password, $confirmPassword) == 0){

            // Require the credentials
            require_once 'db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "SignInForm.php";
                exit;
            }

            // http://php.net/manual/en/mysqli.real-escape-string.php
            $username = $mysqli->real_escape_string($username);
            $password = $mysqli->real_escape_string($password);

            //more secure password storing for website
            $password = sha1($password); 

            // Build query
            $query = "INSERT into users (username, userPassword) values ('$username', '$password')";

            $mysqliResult = $mysqli->query($query);
    //		
    //        // If there was a result...
            if ($mysqliResult) {
                $mysqli->close();

                $_SESSION['loggedin'] = $username;
                header("Location: index.php");
                exit;
            }
            // Else, there was no result
            else {
              $error = 'Create User Error: Please contact the system administrator.';
              require "CreateAccount.php";
              exit;
            }
        }
        else{
            $error = 'Error: Passwords do not match.';
            require "CreateAccount.php";
            exit;
        }
    }

	function resetForm() {
		$username = "";
		$error = "";
		require "SignInForm.php";
	}
	
		
?>