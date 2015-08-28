<? include("login.php");?>

<?php
	if($error){
		echo addslashes($error);
	}
	if($message){

		echo addslashes($message);
		//"logout"=0;
	}
?>

<form method="post">
	<input type="email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"/>
	<input type="password" name="password" value="<?php echo addslashes($_POST['password']); ?>"/>
	<input type="submit" name="submit" value="Sign Up"/>
</form>

<form method="post">
	<input type="email" name="loginemail" id="loginemail" value="<?php echo addslashes($_POST['email']); ?>"/>
	<input type="password" name="loginpassword" value="<?php echo addslashes($_POST['password']); ?>"/>
	<input type="submit" name="submit" value="Log In"/>
</form>
