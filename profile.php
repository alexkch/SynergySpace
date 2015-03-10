<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Profile - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/profile.css"> <!-- Profile CSS Styling -->
</head>
<?php
session_start(); // Start PHP session to test if user is logged in.
$username = $_SESSION['username'];
if (!isset($username) || empty($username)) {
      // They are not logged in. Redirect to login page with error.
	  header("Location: http://synergyspace309.herokuapp.com/login.php#error");
      die();
} else { //User logged in!
	$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
		or die('Could not connect: ' . pg_last_error());
	
	$query = "SET search_path TO synergy; SELECT * FROM users WHERE username='$username'";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	// We need to parse $result to get user information and fill this page.
}

$username = $_SESSION['username'];
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
	<nav></nav>
	<aside>
		<a href=""><span class="fa fa-pencil"></span>Update Account Information</a>
		<a href="/changepass.php"><span class="fa fa-unlock-alt"></span>Change Account Password</a>
		<a href=""><span class="fa fa-user-secret"></span>Privacy Settings</a>
		<a href="/delete.php"><span class="fa fa-trash-o"></span>Delete Account</a>
	</aside>
	<section>
	<div id="gradient"></div>
<div id="card">
		<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xap1/v/t1.0-1/c0.0.160.160/p160x160/10690125_757073407667986_4519955383896243899_n.jpg?oh=e257227f21b2fcb0968537e017505b3a&amp;oe=55799810&amp;__gda__=1438501255_c60f97922345625eb33199e96fde4c2d">
		<h2>Kevin Bath</h2>
		<p id="occupation">Web Developer</p>
		<p id="burthdate">June 28, 19994</p>
		<p id="gender">Male</p>
		<span id="homeaddress" class="left bottom">111 St George St</span>
		<span id="phonenumber" class="right bottom">(416) 770-6583</span>
	</div>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>