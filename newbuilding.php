<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Register - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/register.css"> <!-- Register CSS Styling -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->

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
function postBuilding() { 
	$network = $_POST['network'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$country = $_POST['country'];
	$capacity = $_POST['capacity'];
	$query = pg_query("SET search_path TO synergy; INSERT INTO building(n_id,address,city,country,capacity,worknumber) VALUES ('$network','$address','$city','$country',$capacity,'unknown')");
		or die('Query failed: ' . pg_last_error()); 
	if($data = pg_fetch_object($query)) { 
		header("Location: http://synergyspace309.herokuapp.com/building.php#id=".$data->b_id);
	} 
} 
if(isset($_POST['submit'])) { postBuilding(); }

// Closing connection
pg_close($dbconn);
?>
<body>

	<section>
		<form id='register' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method='post' accept-charset='UTF-8'>
			<fieldset >
				<legend><span class="fa fa-plus fa-2x"></span>New Space</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='text' name='address' id='address' maxlength="20" placeholder="Address"/>
				<input type='text' name='city' id='city' maxlength="50" placeholder="City"/>
				<input type='text' name='country' id='country' maxlength="20" placeholder="Country"/>
				<input type='text' name='capacity' id='capacity' maxlength="4" placeholder="Capacity"/>
				<input type='text' name='network' id='network' maxlength="20" placeholder="Network"/>
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
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