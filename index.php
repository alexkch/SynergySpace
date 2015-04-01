<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> <!-- BOOTSTRAP -->
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/index.css"> <!-- Index CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> 
</head>
<body>
	<?php
		session_start();
		include 'functions/menu.php';
		if (isset($_SESSION['username'])) {
			userMenu();
		} else {
			defaultMenu();
		}
	?>
	<section>
		<div id="splash">
			<img src="/img/header.jpg"/>
			<h1>SynergySpace</h1>
			<p>Collaborate with other workers and find the perfect space.</p>
			<span class="fa fa-arrow-circle-down fa-4x"></span>
		</div>
		<form id='register' action="register.php" method='post' accept-charset='UTF-8'>
			<fieldset >
				<legend><span class="fa fa-user-plus fa-2x"></span>Register</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<input type='text' name='name' id='name' maxlength="20" placeholder="Name"/>
				<input type='text' name='email' id='email' maxlength="50" placeholder="Email"/>
				<input type='text' name='user' id='user' maxlength="20" placeholder="Username"/>
				<input type='password' name='pass' id='pass' maxlength="20" placeholder="Password"/>
				<input type="radio" name="type" value="tenant">Tenant
				<input type="radio" name="type" value="leaser">Leaser
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
		</form>
    </section>

<!-- script DEFINE jquery first then bootstrap min, then custom js-->

<script src="js/plugin/jquery.js"></script>
<script src="js/plugin/bootstrap.min.js"></script>
<script src="js/sidebar.js"></script>

</body>
</html>
	