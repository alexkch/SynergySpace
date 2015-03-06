<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Register - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
</head>
<?php
//Status Variable for footer information
$status = '';

// Connecting, selecting database
$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6")
    or die('Could not connect: ' . pg_last_error());

function NewUser() { 
	$fullname = $_POST['name']; 
	$userName = $_POST['user']; 
	$email = $_POST['email']; 
	$password = $_POST['pass']; 
	$query = "INSERT INTO users (fullname,userName,email,pass) VALUES ('$fullname','$userName','$email','$password')"; 
	$data = pg_query($query) or die('Query failed: ' . pg_last_error()); 
	if($data) {$status="Registration completed.";}
}

function SignUp() { 
	if(!empty($_POST['user'])) {
		$query = pg_query("SELECT * FROM users WHERE userName = '$_POST[user]' OR email = '$_POST[email]'")
			or die('Query failed: ' . pg_last_error()); 
		if(!$row = pg_fetch_array($query,0) 
			or die('Query failed: ' . pg_last_error())) { NewUser(); } 
		else {$status="Sorry, that username or email is already taken."; } 
	} 
} 
if(isset($_POST['submit'])) { SignUp(); }

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
				<li><a href="/profile.html"><span class="fa fa-cogs"></span>My Account</a></li>
				<li><a href=""><span class="fa fa-plus"></span>Create an Account</a></li>
				<li><a href=""><span class="fa fa-sign-out"></span>Logout</a></li>
				<li><a href=""><span class="fa fa-sign-in"></span>Login</a></li>
			</ul>
		</div>
	</header>
	<section>
		<form id='register' action='register.php' method='post' accept-charset='UTF-8'>
			<fieldset >
				<legend>Register</legend>
				<input type='hidden' name='submitted' id='submitted' value='1'/>
				<label for='name' >Your Full Name*: </label>
				<input type='text' name='name' id='name' maxlength="50" />
				<label for='email' >Email Address*:</label>
				<input type='text' name='email' id='email' maxlength="50" />
				 
				<label for='username' >UserName*:</label>
				<input type='text' name='user' id='user' maxlength="50" />
				 
				<label for='password' >Password*:</label>
				<input type='password' name='pass' id='pass' maxlength="50" />
				<input type='submit' name='submit' value='Submit' />	 
			</fieldset>
		</form>
		</form>
	</section>
	<footer><span id="status"><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</span></footer>
</body>
<script>
	document.getElementById("page").innerHTML = "<?php echo $status; ?>";
</script>
</html>