<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
</head>

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
				<li><a href="/profile.php"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<section></section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>