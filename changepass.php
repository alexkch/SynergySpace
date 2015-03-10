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
      // They are not logged in. Redirect to login page with note code 1.
	  header("Location: http://synergyspace309.herokuapp.com/login.php#note=1");
      die();
}
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
    or die('Could not connect: ' . pg_last_error());

function updateUser() { 
	$user = $_POST['user']; 
	$newPass = $_POST['pass']; 
	$newPassConf = $_POST['passconf'];  
	$oldPass = $_POST['old'];
	// Test if new passwords match
	if (strcmp($newPass, $newPassConf)==0) {
		$userQuery = "SET search_path TO synergy; SELECT password FROM users WHERE username='$user' AND password=md5('$oldPass');";
		$dataPass = pg_query($userQuery) or die('Query failed: ' . pg_last_error());
		if ($dataPass) { // Testing user credentials
			if (strcmp($newPass, $oldPass)!=0) { // Ensure setting NEW pass
				$query = "SET search_path TO synergy; UPDATE users SET password=md5('$newPass') WHERE password=md5('$oldPass') AND username='$user';"; 
				$data = pg_query($query) or die('Query failed: ' . pg_last_error()); 
				if($data) { //Pass Change successful
					session_destroy(); //Log out
					//Go to log-in page, with note 2: 'Account password changed successfully.'
					header("Location: http://synergyspace309.herokuapp.com/login.php#note=2");
					die();
				}
			} else { // New pass is same as old
				header("Location: http://synergyspace309.herokuapp.com/changepass.php#error");
				die();
			}
		} else { // User credentials wrong
			header("Location: http://synergyspace309.herokuapp.com/changepass.php#error");
			die();
		}
}

if(isset($_POST['submit'])) {updateUser();}

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
		<form id='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  method='post' accept-charset='UTF-8' onsubmit="return confirm('Are you sure you want to change your password?');">
			<fieldset >
				<legend><span class="fa fa-pencil fa-2x"></span>Change Password</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='text' name='user' id='user' maxlength="20" placeholder="Username"/>
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