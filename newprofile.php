<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Profile - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/profile.css"> <!-- Profile CSS Styling -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<link rel="stylesheet" type="text/css" href="CSS/newprofile.css"> <!-- CUSTOM -->
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

			

			                    <p><strong>Skills: </strong>
			                        <span class="tags">html5</span> 
			                        <span class="tags">css3</span>
			                        <span class="tags">jquery</span>
			                        <span class="tags">bootstrap3</span>
			                    </p>
	                		</div>             
	            		</div>            
	            	<div class="col-md-12 divider text-center">
	            	<row>
	                	<div class="col-md-5 emphasis">
	                    	<button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Projects </button>
	                    	<h2><strong>245</strong></h2>                    
	                    	<p><small>Projects</small></p>
	                </div>
	                <div class="col-md-1"></div>
	                <div class="col-md-3 emphasis">
	                    <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>
	                </div>
	                <div class="col-md-3 emphasis">
	                    <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Options </button>
	                </div>
	            </row>
	            

	            <row>
	                <div class="section">
	                    <div class="padding-top">

	                        <div class="col-md-12">

	                          <div class="panel-group" id="accordion">
	                              <div class="panel panel-warning">
	                                  <div class="panel-heading">
	                                    <h4 class="panel-title">
	                                      <a href="#collpase1" data-toggle="collapse" data-parent="accordion">Recent Projects</a>
	                                    </h4>
	                                </div>
	                                  <div id="collpase1" class="panel-collapse collapse in">
	                                    <div class="panel-body">
	                                        <section class="align-box">
	                                          <article class="white-panel"> <img class="prj" src="../css/img/placeholder.gif">
	                                                <h4><a href="#">Title 8</a></h4>
	                                                <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	                                          </article>
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




