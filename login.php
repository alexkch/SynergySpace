<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Login - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/login.css"> <!-- Global CSS Styling -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="src/login.js"async></script>
</head>
<?php

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
    or die('Could not connect: ' . pg_last_error());

function SignIn() { 
	$userName = $_POST['user']; 
	$password = md5($_POST['pass']); 
	if(!empty($_POST['user'])) { 
		$query = "SELECT * FROM users WHERE username='$userName' AND password='$password'";
		$result = pg_query($query) or die('Query failed: ' . pg_last_error());
		if(pg_num_rows($result) != 1) {
			echo "Login Failed! For user: " . $userName;
		} else { //Logged in
			session_start();
			$_SESSION['username'] = $userName;
			header("Location: http://synergyspace309.herokuapp.com/profile.php");
			die();			
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
				<li><a href="/profile.php"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<section>
		<form method="POST" action="login.php"> 
			<fieldset>
				<legend>LOG-IN</legend> 
				<input type="text" name="user" id="user" size="20" placeholder="Username"><br>
				<input type="password" name="pass" size="20" placeholder="Password"><br>
				<input id="button" type="submit" name="submit" value="Log-In"> 
			</fieldset>
		</form> 
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>
</html>