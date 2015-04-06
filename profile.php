<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Profile2 - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/profile.css"> <!-- Profile CSS Styling -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<link rel="stylesheet" type="text/css" href="CSS/profile.css"> <!-- CUSTOM -->
</head>

<?php
session_start(); // Start PHP session to test if user is logged in.
$username = $_SESSION['username'];
if (!isset($username) || empty($username)) {
      // They are not logged in. Redirect to login page with note code 1.
	  header("Location: http://synergyspace309.herokuapp.com/login.php#note=1");
      die();
}
?>
<body>

<div class="section">
	<div class="container" style="padding-top:55px;">
			<div class="row">
				<div class="col-md-4">
	    	 		<div class="well profile">
	            		<div class="col-md-12">
	                  		<div class="col-md-4 text-center">
	                    		<figure>
	                        		<img src="http://www.localcrimenews.com/wp-content/uploads/2013/07/default-user-icon-profile.png" alt="" class="img-circle img-responsive">
	                    		</figure>
	                  		</div>

	             		   <div class="col-md-8 text-right">

	             		   	<?php
								$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
									or die('Could not connect: ' . pg_last_error());
								
								$username = $_SESSION['username'];
								$query = "SET search_path TO synergy; SELECT * FROM users WHERE username='$username'";
								$result = pg_query($query) or die('Query failed: ' . pg_last_error());
								while ($data = pg_fetch_object($result)) {
									echo '<h2>'.$data->name.'</h2>';
									echo '<p><strong>Occupation: </strong><span class="tags">' .$data->occupation. '</span></p> ';
									echo '<p><strong>Address: </strong><span class="tags">' .$data->homeaddress. '</span></p> ';
									echo '<p>Birth Date: '.$data->birthdate.'</p>';
									echo '<p>Gender: '.$data->gender.'</p>';
									echo '<p>Phone: '.$data->phonenumber.'</p>';
								}
							?>
	                		</div>             
	            		</div>            
	            	<div class="col-md-12 divider text-center">
	            	<row>
	                	<div class="col-md-5 emphasis">
	                    	<button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span><a class="white" href="newbuilding.php"> Add new space </a></button>
	                    	<!-- <h2><strong>245</strong></h2>                    
	                    	<p><small>Buildings</small></p> -->
	               		</div>
	                <div class="col-md-1"></div>
	                <div class="col-md-3 emphasis">
	                    <button class="btn btn-primary btn-block"><span class="fa fa-gear"></span><a class="white" href="changepass.php"> Change Password </a></button>
	                </div>
	                <div class="col-md-3 emphasis">
	                    <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span><a class="white" href="updateuser.php"> Edit </a></button>
	                </div>
	            </row>
	            

	            <row>
	                <div class="section">
	                    <div class="padding-top">

	                        <div class="col-md-12">

	                          <div class="panel-group" id="accordion">
	                              <div class="panel panel-default">
	                                  <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                      <a href="#collpase1" data-toggle="collapse" data-parent="accordion">My Buildings</a>
	                                    </h4>
	                                </div>
	                                  <div id="collpase1" class="panel-collapse collapse in">
	                                    <div class="panel-body">
	                                        <section class="align-box">
	                                          			<?php
															$dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
																or die('Could not connect: ' . pg_last_error());
															$username=$_SESSION['username'];
															$query = "SET search_path TO synergy; SELECT * FROM building WHERE username='$username';";
															$result = pg_query($query) or die('Query failed: ' . pg_last_error());
															while ($data = pg_fetch_object($result)) {

																echo '<article class="white-panel">';
																echo '<span class="fa fa-building-o fa-2x"></span>';
																echo '<h4><a href="/building.php?id='.$data->b_id.'">'.$data->address.'</h2></a></h4>';
																echo '<p>City: '.$data->city.'</p>';
																echo '<p>Country: '.$data->country.'</p>';
																echo '<p>Capacity: '.$data->capacity.'</p>';
																echo '</article>';
															}
														?>
	                                      </section>
	                                    </div>
	                                  </div>
	                              </div>
	                          </div>

	                        </div>


	                </div>
	              </div>

	            </row>
	            </div>
	            
	    	 </div>                 
			</div>
		</div>
	</div>
</div>

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
<script src="js/profilemenu.js"></script>
</body>

</html>