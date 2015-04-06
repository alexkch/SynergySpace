<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>Building - SynergySpace</title>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'> <!-- Google Font Import -->
<link rel="stylesheet" href="CSS/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/global.css"> <!-- Global CSS Styling -->
<link rel="stylesheet" type="text/css" href="CSS/profile.css"> <!-- Profile CSS Styling -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"> 
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="CSS/sidebar.css"> <!-- BOOTSTRAP -->
<link rel="stylesheet" type="text/css" href="CSS/bprofile.css"> <!-- CUSTOM -->
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

  <div class="container padding1">
    <div class="row">
      <div class="col-md-12 padding2">
        <div class="well well-small clearfix">
          <div class="row">
            <div class="col-md-2">
               <i class="fa fa-building fa-5x"></i>      
            </div>
            <div class="col-md-4">

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
                    echo '<h2>'.$data->address.'</h2>';
                    echo '<ul class="list-unstyled">';
                    echo '<li><i class="fa fa-globe fa-2x"></i>'.$data->country.', '.$data->city.'</li>';
                    echo '<li><i class="fa fa-users fa-2x"></i>'.$data->capacity.'</li>';
                    echo '</ul>';
                    echo '</div>';
                   
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
            <div class="col-md-6">
            <ul class="list-inline stats">
                 <li>
                   <span>$275</span>
                   per /Month
                </li>
                <li>
                   <span>4</span>
                   Tenants
                </li>

            </ul>
              <div><!--/span6-->
              </div><!--/row-->
        </div>
        <!--Body content-->
      </div>
    </div>
        
      <div class="well">
          <div class="container">
            <div class="row">
                    <?php
                      $id=$_GET['id'];
                      if (empty($id)) {$id=$_POST['id'];} //Get b_id whether POST or GET method used
                      $dbconn = pg_connect("host=ec2-107-20-244-39.compute-1.amazonaws.com dbname=ddn82pff17m8p9 user=vbbkmqgcbmprhj password=hgtlv6g35Sn0zxepyM-f7JKqK6") 
                        or die('Could not connect: ' . pg_last_error());
                      $username=$_SESSION['username'];
                      $query = "SET search_path TO synergy; SELECT * FROM renting,users WHERE b_id='$id' AND renting.username=users.username;";
                      $result = pg_query($query) or die('Query failed: ' . pg_last_error());
                      while ($data = pg_fetch_object($result)) {
                       
                      echo '<div class="user col-md-4">
                                <div class="row">
                                    <div class="avatar col-md-4">'

                      if (strcmp(strtoupper($data->gender), "M")) == 0) { // Logged in
                      		echo '<img class="img-circle" src="img/um2.jpg">'
                      } 

                      else { 
                        echo '<img class="img-circle" src="img/uf.jpg">'
                      }
                        echo '</div><div class="col-md-8">';

                        echo '<h4>'.$data->username.'</h4>';
                        echo '<p>Email: '.$data->email.'</p>';
                        echo '<p>Birthdate: '.$data->birthdate.'</p>';
                        echo '<p>Gender: '.$data->gender.'</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                      }
                    ?>

              <!-- All Divs -->
            </div>
        </div>                    
      </div> 

  </div>  <!-- End building page -->    



<!-- Nav bar -->

    <?php
    include 'functions/menu.php';
    if (isset($_SESSION['username'])) {
      userMenu();
    } else {
      defaultMenu();
    }
  ?>

</div>
</div>
</body>


<script src="js/plugin/jquery.js"></script>
<script src="js/plugin/bootstrap.min.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/profilemenu.js"></script>
</body>

</html>

