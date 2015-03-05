<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Search - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
</head>

<!-- EXAMPLE PHP CODE, DELETE WHEN NECCESSARY
<?php
// Connecting, selecting database
$dbconn = pg_connect("host=ec2-50-19-249-214.compute-1.amazonaws.com dbname=d4ppai3ve17g1b user=joblkqktbkwsnj password=REyBIR2hC2G-vSSYBgud-hPlgf")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT *';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($result);

// Closing connection
pg_close($dbconn);
?>
-->
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
				<li><a href="/profile.html"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href=""><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href=""><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href=""><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<nav></nav>
	<aside>
	</aside>
	<section></section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>