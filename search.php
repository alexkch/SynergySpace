<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Search - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/search.css"> <!-- Search CSS Styling -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="src/search.js" async></script>
</head>
<body>
	<?php
		session_start();
	?>
	<aside>
	<?php 
		function ascendVSdescend($att) {
			$str="";
			switch($_GET['order']){
				case $att.' asc':$str='desc';break;
				case $att.' desc':$str='asc';break;
				default: $str='asc';
			}
			return $str;
		}
	?>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="b_id <?php echo ascendVSdescend('b_id');?>" />
		<button type="submit">
			<span class="fa fa-random"></span>Date Listed<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('b_id');?>"></span>
		</button>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="address <?php echo ascendVSdescend('address');?>" /> 
		<button type="submit">
			<span class="fa fa-map-marker"></span>Address<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('address');?>"></span>
		</button>	
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="city <?php echo ascendVSdescend('city');?>" /> 
		<button type="submit">
			<span class="fa fa-map-marker"></span>City<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('city');?>"></span>
		</button>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="country <?php echo ascendVSdescend('country');?>" /> 
		<button type="submit">
			<span class="fa fa-map-marker"></span>Country<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('country');?>"></span>
		</button>	
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="n_id <?php echo ascendVSdescend('n_id');?>" /> 
		<button type="submit">
			<span class="fa fa-connectdevelop"></span>Network<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('n_id');?>"></span>
		</button>
		</form>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
		<input type="hidden" name="q" value="<?php echo $_GET['q'];?>" />
		<input type="hidden" name="order" value="capacity <?php echo ascendVSdescend('capacity');?>" /> 
		<button type="submit">
			<span class="fa fa-users"></span>Capacity<span class="fa fa-sort-alpha-<?php echo ascendVSdescend('capacity');?>"></span>
		</button>
		</form>
	</aside>
	<section>
		<?php
			$search=$_GET['q'];
			$order=$_GET['order'];
			if (empty($order)) {$order="b_id";}
			$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
				or die('Could not connect: ' . pg_last_error());
			
			$query = "SET search_path TO synergy; SELECT * FROM building WHERE LOWER(address) LIKE LOWER('%$search%') ORDER BY $order;";
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
			while ($data = pg_fetch_object($result)) {
				echo '<div class="building">';
				echo '<span class="fa fa-building-o fa-2x"></span>';
				echo '<a href="/building.php?id='.$data->b_id.'"><h2>'.$data->address.'</h2></a>';
				echo '<p>City: '.$data->city.'</p>';
				echo '<p>Country: '.$data->country.'</p>';
				echo '<p>Capacity: '.$data->capacity.'</p>';
				echo '</div>';
			}
		?>
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
</body>

</html>