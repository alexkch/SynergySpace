<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Change Password - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/changepass.css"> <!-- CP CSS Styling -->
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
	$newPass = md5($_POST['pass']); 
	$newPassConf = md5($_POST['passconf']);  
	$oldPass = md5($_POST['old']);
	// Test if new passwords match
	if (strcmp($newPass, $newPassConf)==0) {
		if (!strcmp($newPass, $oldPass)==0) {
			$query = "SET search_path TO synergy; UPDATE users SET password='$newPass' WHERE password='$oldPass' AND username='$username'"; 
			$data = pg_query($query) or die('Query failed: ' . pg_last_error()); 
			if($data) { //Pass Change successful
				session_destroy(); // Delete all data associated with user
				header("Location: http://synergyspace309.herokuapp.com/login.php#user=".$userName);
				die();
			}
		} else {
			alert("You cannot change your password to the one already in use.");
		}
	} else {
		alert("The new password does not match the confirmation new password.");
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
		<form id='register' action='changepass.php' method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to change your password?');">
			<fieldset >
				<legend><span class="fa fa-pencil fa-2x"></span>Change Password</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='password' name='old' id='old' maxlength="20" placeholder="Old Password"/>
				<input type='password' name='pass' id='pass' maxlength="20" placeholder="New Password"/>
				<input type='password' name='passconf' id='passconf' maxlength="20" placeholder="Confirm New Password"/>
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
		</form>
		</form>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>
</html>