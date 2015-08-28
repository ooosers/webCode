<?php
	session_start();

	include("connection.php");

	$query="UPDATE posters SET description='".mysqli_real_escape_string($link, $_POST['poster'])."' WHERE id='".$_SESSION['id']."'LIMIT 1";
	
	mysqli_query($link,$query);


?>



<form method="post">

<input name="poster" />
<input type="submit"/>

</form>
