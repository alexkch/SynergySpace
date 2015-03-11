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
		<a href="/updateuser.php"><span class="fa fa-pencil"></span>Update Account Information</a>
		<a href="/changepass.php"><span class="fa fa-unlock-alt"></span>Change Account Password</a>
		<a href=""><span class="fa fa-user-secret"></span>Privacy Settings</a>
		<a href="/delete.php"><span class="fa fa-trash-o"></span>Delete Account</a>
	</aside>
	<section>
	<div id="gradient"></div>
	<div id="card">
		<?php
			$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
				or die('Could not connect: ' . pg_last_error());
			
			$query = "SET search_path TO synergy; SELECT * FROM users WHERE username='$username'";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
			$data = pg_fetch_object($result)
			echo '<img src="http://www.adtechnology.co.uk/images/UGM-default-user.png">';
			echo '<h2>'.$data->name.'</h2>';
			echo '<p>'.$data->occupation.'</p>';
			echo '<p>'.$data->birthdate.'</p>';
			echo '<p>'.$data->gender.'</p>';
			echo '<span class="left bottom">'.$data->homeaddress.'</span>';
			echo '<span class="right bottom">'.$data->phonenumber.'</span>';
		?>
	</div>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>