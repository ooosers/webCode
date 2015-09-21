<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<?php
	//session_start();
	//Logou function
	//	if($_GET["logout"]==1 AND $_COOKIE['id']) {
		//session_destroy();
		//setcookie("id","",time()-3600);
	//	$message="You have been logged out. Have a nice day!";
	//}

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

				$query="INSERT INTO `users` (`email`, `password`, `firstname`, `lastname`, `mobilePhone`,`gender`)VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".md5(md5($_POST['email']).$_POST['password'])."','".mysqli_real_escape_string($link, $_POST['firstname'])."','".mysqli_real_escape_string($link, $_POST['lastname'])."','".mysqli_real_escape_string($link, $_POST['mobilePhone'])."','".mysqli_real_escape_string($link, $_POST['gender'])."')";
				     																																																	
				mysqli_query($link,$query);


				echo "You've been signed up!";

				$_COOKIE['id']=mysqli_insert_id($link);
				setcookie("id",$_COOKIE['id'],time()+60*60*24*7);
				$query="INSERT INTO `searchsettings` (`id`)VALUES ('".mysqli_real_escape_string($link, $_COOKIE['id'])."')";
				     																																																	
				mysqli_query($link,$query);

				header("location:index.php");
			}
			
		 }
	}
	if ($_POST['submit']=="Log In"){

			$query = "SELECT * FROM users WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."' AND password='".md5(md5($_POST['email']).$_POST['password'])."'LIMIT 1";

			$result = mysqli_query($link,$query);
			$row = mysqli_fetch_array($result);
			if($row){

				setcookie("id",$row['id'],time()+60*60*24*7);
				header("location:index.php");


			}else{
				$error.= "We could not find a user with that email and password. Please try a again ";
			}

	}

?>

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
	<input type="email" placeholder="Email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"/>
	<input type="password" placeholder="password" name="password" value="<?php echo addslashes($_POST['password']); ?>"/>
	<input type="submit" name="submit" value="Log In"/>
</form>
      <div class="page-header"><h1> </h1></div>
<form method="post">

	<div><input type="text" placeholder="First name" name="firstname" id="firstname" value="<?php echo addslashes($_POST['firstname']); ?>"/>

	<input type="text" placeholder="Last name" name="lastname" id="lastname" value="<?php echo addslashes($_POST['lastname']); ?>"/></div>

	<div><input type="email" placeholder="Email" name="email" id="email" value="<?php echo addslashes($_POST['email']); ?>"/></div>

	<div><input type="tel" pattern="[0-9]{10}" placeholder="MobilePhone" name="mobilePhone" id="mobilePhone" value="<?php echo addslashes($_POST['mobilePhone']); ?>"/></div>

	<div><input type="password" placeholder="password" name="password" value="<?php echo addslashes($_POST['password']); ?>"/></div>
<!--birthday  -->    
    <div>Birthday</div>
    <div>

    		<select name="birthday_month" id="month" title="Month" class="">
    			<option value="0" selected="1">Month</option>
    			<option value="1">Jan</option>
    			<option value="2">Feb</option>
    			<option value="3">Mar</option>
    			<option value="4">Apr</option>
    			<option value="5">May</option>
    			<option value="6">Jun</option>
    			<option value="7">Jul</option>
    			<option value="8">Aug</option>
   				<option value="9">Sep</option>
   				<option value="10">Oct</option>
   				<option value="11">Nov</option>
   				<option value="12">Dec</option>
    		</select>
    		<select name="birthday_day" id="day" title="Day" class="">
    			<option value="0" selected="1">Day</option>
    			<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option>
    			<option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option>
    			<option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option>
    			<option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
    			<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option>
    			<option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option>
    			<option value="31">31</option>
   			</select>
   			<select name="birthday_year" id="year" title="Year" class="">
    			<option value="0" selected="1">Year</option>
    			<option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option>
    			<option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option>
    			<option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option>
    			<option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option>
    			<option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option>
    			<option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option>
    			<option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option>
    			<option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option>
    			<option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option>
    			<option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option>
    			<option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option>
    			<option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option>
    			<option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option>
    			<option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option>
    			<option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option>
    			<option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option>
    			<option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option>
    			<option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option>
    			<option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option>
    			<option value="1920">1920</option><option value="1919">1919</option><option value="1918">1918</option><option value="1917">1917</option><option value="1916">1916</option>
    			<option value="1915">1915</option><option value="1914">1914</option><option value="1913">1913</option><option value="1912">1912</option><option value="1911">1911</option>
    			<option value="1910">1910</option><option value="1909">1909</option><option value="1908">1908</option><option value="1907">1907</option><option value="1906">1906</option>
    		</select>

    		<a href="#" ajaxify="/help/ajax/reg_birthday/?xui" title="helps make sure you get the right Ooosers experience for your age." rel="async" role="button">Why do I need to provide my birthday?</a>

    	</div>
<!--Gender  -->

	<div>
		<input type="radio" name="gender" id="gender" value="1"/>Female
		<input type="radio" name="gender" id="gender" value="2"/>Male
	</div>


	<input type="submit" name="submit" value="Sign Up"/>

	<a href="http://79.170.44.213/yingzi0310.com/ooosers/index.php">back to main</a>
</form>
