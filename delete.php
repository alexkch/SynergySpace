<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Register - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/register.css"> <!-- Delete CSS Styling -->
</head>
<?php
session_start(); // Start PHP session to test if user is logged in.
$username = $_SESSION['username'];
if (!isset($username) || empty($username)) {
      // They are not logged in. Redirect to login page with error.
	  header("Location: http://synergyspace309.herokuapp.com/login.php#error");
      die();
}
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
    or die('Could not connect: ' . pg_last_error());

function deleteUser() { 
	$userName = $_POST['user']; 
	$password = md5($_POST['pass']);  
	$query = "SET search_path TO synergy; DELETE FROM users WHERE username='$userName' AND password='$password'"; 
	$data = pg_query($query) or die('Query failed: ' . pg_last_error()); 
	if($data) { //Deletion successful
		header("Location: http://synergyspace309.herokuapp.com/index.php#deleted=".$userName);
        die();
	}
}

if(isset($_POST['submit'])) {deleteUser();}

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
				<?php
					include 'functions/menu.php';
					if (isset($_SESSION['username'])) {
						userMenu();
					} else {
						defaultMenu();
					}
				?>
			</ul>
		</div>
	</header>
	<section>
		<form id='register' action='delete.php' method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to delete your account?');">
			<fieldset >
				<legend>Delete Account</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='text' name='user' id='user' maxlength="20" placeholder="Username"/>
				<input type='password' name='pass' id='pass' maxlength="20" placeholder="Password"/>
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
		</form>
		</form>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>
</html>