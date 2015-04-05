<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Update Account - SynergySpace</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/register.css"> <!-- Register CSS Styling -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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

$pgquery=pg_query("SET search_path TO synergy; SELECT * FROM users WHERE username='$username'")
	or die('Query failed: ' . pg_last_error());
$info=pg_fetch_object($pgquery);
// updateUser with POSTed information
function updateUser() {
	$user=$_SESSION['username'];
	$name=$_POST['name'];
	$type=$_POST['type'];
	$occupation=$_POST['occupation'];
	$birthdate=$_POST['birthdate'];
	$gender=$_POST['gender'];
	$homeaddress=$_POST['homeaddress'];
	$phonenumber=$_POST['phonenumber'];
	$query = "
		SET search_path TO synergy; 
		UPDATE users SET name='$name',type='$type',
			occupation='$occupation',birthdate='$birthdate',
			gender='$gender',homeaddress='$homeaddress', 
			phonenumber='$phonenumber' 
		WHERE username='$user'";
	$data = pg_query($query) or die('Query failed: ' . pg_last_error());
	if($data) { // Update successful
		//Go to profile page
		header("Location: http://synergyspace309.herokuapp.com/profile.php");
		die();
	}
}
if(isset($_POST['submit'])) {updateUser();}

// Closing connection
pg_close($dbconn);
?>
<body>
	<?php
		session_start();

	?>
	<section>
		<form id='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' accept-charset='UTF-8'>
			<fieldset >
				<legend><span class="fa fa-pencil fa-2x"></span>Update Account</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='text' name='name' id='name' maxlength="20" placeholder="Name"
					value='<?php echo $info->name; ?>'/>
				<input type='text' name='occupation' id='occupation' maxlength="100" placeholder="Occupation"
					value='<?php echo $info->occupation; ?>'/>
				<input type='text' name='birthdate' id='birthdate' maxlength="20" placeholder="Birth Date"
					value='<?php echo $info->birthdate; ?>'/>
				<input type='text' name='gender' id='gender' maxlength="20" placeholder="Gender"
					value='<?php echo $info->gender; ?>'/>
				<input type='text' name='homeaddress' id='homeaddress' maxlength="100" placeholder="Address"
					value='<?php echo $info->homeaddress; ?>'/>
				<input type='text' name='phonenumber' id='phonenumber' maxlength="20" placeholder="Phone Number"
					value='<?php echo $info->phonenumber; ?>'/>
				<input type="radio" name="type" value="tenant">Tenant
				<input type="radio" name="type" value="leaser">Leaser
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
		</form>
		</form>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>

	<!-- Nav bar -->

    <?php
		include 'functions/menu.php';
		if (isset($_SESSION['username'])) {
			userMenu();
		} else {
			defaultMenu();
		}
	?>

<script src="js/plugin/jquery.js"></script>
<script src="js/plugin/bootstrap.min.js"></script>
<script src="js/sidebar.js"></script>

</body>
</html>