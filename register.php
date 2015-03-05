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
function RegisterUser()
{
    if(!isset($_POST['submitted'])) {
       return false;
    }
     
    $formvars = array();
     
    if(!$this->ValidateRegistrationSubmission()) {
        return false;
    }
     
    $this->CollectRegistrationSubmission($formvars);
     
    if(!$this->SaveToDatabase($formvars)) {
        return false;
    }
     
    if(!$this->SendUserConfirmationEmail($formvars)) {
        return false;
    }
 
    $this->SendAdminIntimationEmail($formvars);
     
    return true;
}

function SaveToDatabase(&$formvars){
    if(!$this->DBLogin()) {
        $this->HandleError("Database login failed!");
        return false;
    }
    if(!$this->Ensuretable()) {
        return false;
    }
    if(!$this->IsFieldUnique($formvars,'email')) {
        $this->HandleError("This email is already registered");
        return false;
    }
        
    if(!$this->IsFieldUnique($formvars,'username')) {
        $this->HandleError("This UserName is already used. Please try another username");
        return false;
    }        
    if(!$this->InsertIntoDB($formvars)) {
        $this->HandleError("Inserting to Database failed!");
        return false;
    }
    return true;
}
   
function CreateTable() {
    $qry = "Create Table $this->tablename (".
            "id_user INT NOT NULL AUTO_INCREMENT ,".
            "name VARCHAR( 128 ) NOT NULL ,".
            "email VARCHAR( 64 ) NOT NULL ,".
            "phone_number VARCHAR( 16 ) NOT NULL ,".
            "username VARCHAR( 16 ) NOT NULL ,".
            "password VARCHAR( 32 ) NOT NULL ,".
            "confirmcode VARCHAR(32) ,".
            "PRIMARY KEY ( id_user )".
            ")";
             
    if(!mysql_query($qry,$this->connection))
    {
        $this->HandleDBError("Error creating the table \nquery was\n $qry");
        return false;
    }
    return true;
}

function InsertIntoDB(&$formvars) {
    $confirmcode = $this->MakeConfirmationMd5($formvars['email']);
 
    $insert_query = 'insert into '.$this->tablename.'(
            name,
            email,
            username,
            password,
            confirmcode
            )
            values
            (
            "' . $this->SanitizeForSQL($formvars['name']) . '",
            "' . $this->SanitizeForSQL($formvars['email']) . '",
            "' . $this->SanitizeForSQL($formvars['username']) . '",
            "' . md5($formvars['password']) . '",
            "' . $confirmcode . '"
            )';      
    if(!mysql_query( $insert_query ,$this->connection)) {
        $this->HandleDBError("Error inserting data to the table\nquery:$insert_query");
        return false;
    }        
    return true;
}

function SendUserConfirmationEmail(&$formvars) {
    $mailer = new PHPMailer();
     
    $mailer->CharSet = 'utf-8';
     
    $mailer->AddAddress($formvars['email'],$formvars['name']);
     
    $mailer->Subject = "Your registration with ".$this->sitename;
 
    $mailer->From = $this->GetFromAddress();        
     
    $confirmcode = urlencode($this->MakeConfirmationMd5($formvars['email']));
     
    $confirm_url = $this->GetAbsoluteURLFolder().'/confirmreg.php?code='.$confirmcode;
     
    $mailer->Body ="Hello ".$formvars['name']."\r\n\r\n".
    "Thanks for your registration with ".$this->sitename."\r\n".
    "Please click the link below to confirm your registration.\r\n".
    "$confirm_url\r\n".
    "\r\n".
    "Regards,\r\n".
    "Webmaster\r\n".
    $this->sitename;
 
    if(!$mailer->Send()) {
        $this->HandleError("Failed sending registration confirmation email.");
        return false;
    }
    return true;
}
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
				<input type='text' name='username' id='username' maxlength="50" />
				 
				<label for='password' >Password*:</label>
				<input type='password' name='password' id='password' maxlength="50" />
				<input type='submit' name='Submit' value='Submit' />	 
			</fieldset>
		</form>
	</section>
	<footer><a href="https://synergyspace309.herokuapp.com/">SynergySpace</a> is a coworking space rental and teaming to succeed service. &copy; 2015</footer>
</body>

</html>