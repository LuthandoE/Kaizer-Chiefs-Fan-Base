<?php

    ob_start();
	session_start();
	require_once('config.php');
    require_once('error_handler.php');
    require_once('News.php');
   
     $conn = new News();
	 //$dbcon = mysqli_select_db($conn ,DB_DATABASE);
    
        
	// it will never let you open index(login) page if session is set
	if ( isset($_SESSION['user'])!="" ) {
		header("Location: addNews.php");
		exit;
	}
	
	if( isset($_POST['btn-login']) ) {
		
		$username = $_POST['username']; 
		$upass = $_POST['pass'];
        
        $username = strip_tags(trim($username));
		$upass = strip_tags(trim($upass));
         
		//$password = hash('sha256', $upass); // password hashing using SHA256
		
		$res = $conn->getUsername($username);
		
		$row = mysqli_fetch_array($res);
		
		$count = mysqli_num_rows($res); // if uname/pass correct it returns must be 1 row
		//$password = hash('sha256', $upass);
		if( $count == 1 && $row['pass']== $upass) {
			$_SESSION['user'] = $row['userid'];
			header("Location: addNews.php");
		} else {
			$errMSG = "Wrong Credentials, Try again...";
		}
	   }

?>