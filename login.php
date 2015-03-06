<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Login - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
</head>
<?php

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
    or die('Could not connect: ' . pg_last_error());

function SignIn() { 
	$userName = $_POST['user']; 
	$password = md5($_POST['pass']); 
	if(!empty($_POST['user'])) { 
		$query = "SELECT * FROM users WHERE username='$userName' AND pass='$password'";
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		if(pg_num_rows($result) != 1) {
			echo "Login Failed! For user: " . $userName . "/" . $password;
		} else {
			echo "Login Successful!" . pg_num_rows($result);
		}
	} 
}
if(isset($_POST['submit'])) {SignIn();}

// Closing connection
pg_close($dbconn);
?>
<body>
	<header>
		<a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
		<div id='search-box'>
			<form action='/search' id='search-form' method='get' target='_top'>
				<input id='search-text' name='q' placeholder='Search by postal code' type='text' autocomplete="off"/>
				<button id='search-button' type='submit'>                     
					<span class="fa fa-search"></span>
				</button>
			</form>
		</div>
		<div id="account">
			<ul>
				<li><a href="/profile.html"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<section>
		<fieldset style="width:30%">
			<legend>LOG-IN HERE</legend> 
			<form method="POST" action="login.php"> 
				User <br>
				<input type="text" name="user" size="40"><br>
				Password <br><input type="password" name="pass" size="40"><br>
				<input id="button" type="submit" name="submit" value="Log-In"> 
			</form> 
		</fieldset>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>
</html>