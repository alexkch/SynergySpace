<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Building - SynergySpace</title>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/building.css"> <!-- Building CSS Styling -->
</head>
<body>
	<?php
		session_start();
		// Connecting, selecting database
		$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
			or die('Could not connect: ' . pg_last_error());
		function rentBuilding() { 
			$username = $_SESSION['username'];
			$id=$_GET['id'];
			if (empty($id)) {$id=$_POST['id'];} //Get b_id whether POST or GET method used
			if ($_POST['method']==1) {
				$query = "SET search_path TO synergy; INSERT INTO renting VALUES ('$username','$id');";
			} else {
				$query = "SET search_path TO synergy; DELETE FROM renting WHERE username='$username' AND b_id='$id';";
			}
			$result = pg_query($query)
				or die('Query failed: ' . pg_last_error()); 
			if($result) { 
				header("Location: http://synergyspace309.herokuapp.com/building.php?id=".$id);
			} 
		} 
		if($_SERVER['REQUEST_METHOD'] == 'POST') { rentBuilding(); }

		// Closing connection
		pg_close($dbconn);
	?>
	<section>
	<div id="info">
		<?php
			$id=$_GET['id'];
			if (empty($id)) {$id=$_POST['id'];} //Get b_id whether POST or GET method used
			
			$username=$_SESSION['username'];
			$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
				or die('Could not connect: ' . pg_last_error());
			
			$query = "SET search_path TO synergy; SELECT * FROM building WHERE b_id='$id'";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error()); // Get building based on GET or POST id
			
			$q2 = "SET search_path TO synergy; SELECT * FROM renting WHERE b_id='$id' AND username='$username'";
			$r2 = pg_query($q2) or die('Query failed: ' . pg_last_error()); // Test if user rented space
			
			while ($data = pg_fetch_object($result)) {
				echo '<div class="building">';
				echo '<span class="fa fa-building-o fa-2x"></span>';
				echo '<a href="/building.php?id='.$data->b_id.'"><h2>'.$data->address.'</h2></a>';
				echo '<p>City: '.$data->city.'</p>';
				echo '<p>Country: '.$data->country.'</p>';
				echo '<p>Capacity: '.$data->capacity.'</p>';
				if (!empty($username)) { // Logged in
					if (pg_num_rows($r2)==0) { // user has not rented space
						echo '<form action="building.php" method="post">
						  <input type="hidden" name="id" value="'.$id.'"/>
						  <input type="hidden" name="method" value="1"/>
						  <button type="submit" name="submit"><span class="fa fa-plus"></span>Rent Space</button>
						  </form>';
					} else { // user has rented space
						echo '<form action="building.php" method="post">
						  <input type="hidden" name="id" value="'.$id.'"/>
						  <input type="hidden" name="method" value="0"/>
						  <button type="submit" name="submit"><span class="fa fa-minus"></span>Stop Renting Space</button>
						  </form>';
					}
				}
				echo '</div>';
			}
		?>
	</div>
	<div id="users">
		<p>Users renting this space:</p>
		<?php
			$id=$_GET['id'];
			if (empty($id)) {$id=$_POST['id'];} //Get b_id whether POST or GET method used
			$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
				or die('Could not connect: ' . pg_last_error());
			$username=$_SESSION['username'];
			$query = "SET search_path TO synergy; SELECT * FROM renting,users WHERE b_id='$id' AND renting.username=users.username;";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
			while ($data = pg_fetch_object($result)) {
				echo '<div class="user">';
				echo '<span class="fa fa-user"></span>';
				echo '<p>'.$data->username.'</p>';
				echo '<p>Email: '.$data->email.'</p>';
				echo '<p>Birthdate: '.$data->birthdate.'</p>';
				echo '<p>Gender: '.$data->gender.'</p>';
				echo '</div>';
			}
		?>
	</div>
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