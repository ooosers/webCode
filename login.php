<?php
	session_start();
	//Logou function
	if($_GET["logout"]==1 AND $_SESSION['id']) {session_destroy();
		$message="You have been logged out. Have a nice day!";
	}

	include("connection.php");
	if ($_POST['submit']=="Sign Up"){
		if(!$_POST['email']) $error.="Please enter your email!<br />";
			else if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) $error.="Please enter a valid email address!<br />";

			if (!$_POST['password']) $error.="Please enter your password!<br />";
			if(strlen($_POST['password'])<8) $error.="Please include with at least 8 characters!<br />";
			if(!preg_match('`[A-Z]`',$_POST['password'])) $error.="Please include with at lease one capital characters!<br />";
		 	
		 if($error) echo "There were error(s) in your signup details:<br />".$error;
		 else {
		 	
		 	
			if (mysqli_connect_error()) {

				echo "Could not connect to database";

			}//else{echo "connect to database sucessful!";}

			$query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."'";

			$result = mysqli_query($link,$query);
			$results = mysqli_num_rows($result);
			if ($results) $error.= "That email address is alreay registered. Do you want to login?";
			else{

				$query="INSERT INTO `users` (`email`, `password`)VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."')";
				     
				zmysqli_query($link,$query);
				echo "You've been signed up!";

				$_SESSION['id']=mysqli_insert_id($link);

				//print_r($_SESSION);
				header("location:mainpage.php");
			}
			
		 }
	}

	if ($_POST['submit']=="Log In"){

			$query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['loginemail'])."' AND password='".md5(md5($_POST['loginemail']).$_POST['loginpassword'])."'LIMIT 1";

			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if($row){
				$_SESSION['id']=$row['id'];
				//print_r($_SESSION);
				header("location:mainpage.php");


			}else{
				$error.= "We could not find a user with that email and password. Please try a again ";
			}

	}

?>
