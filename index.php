<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- For MOBILE -->
<title>SynergySpace</title>
	
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css">
  
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <link rel='stylesheet' href='CSS/intro.css'>

</head>

<body>



    <!-- Header -->
    <header id="top" class="img1">
        <div class="text-vertical-center">
            <h1>Synergy Space</h1>
            <h3>A personal space for your ideas</h3>
            <br>
            <a href="#about" class="btn btn-dark btn-lg">Find Out More</a>
            <a href="home.php" class="btn btn-dark btn-lg" style="color: white;">Go to Site</a>
        </div>
    </header>

    <!-- About -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Synergy Space can find the perfect workplace for your next project!</h2>
                    <p class="lead">Create, share and get inspired</p>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Services -->
    <section id="services" class="services bg-primary">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-10 col-lg-offset-1">
                    <h2>Our Services</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-4 col-sm-8">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-globe fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name 1</strong>
                                </h4>
                                <p>BLAH BLAH BLAH</p>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-users fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p>text goes here</p>

                            </div>
                        </div>
                        <div class="col-md-4 col-sm-8">
                            <div class="service-item">
                                <span class="fa-stack fa-4x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-smile-o fa-stack-1x text-primary"></i>
                            </span>
                                <h4>
                                    <strong>Service Name</strong>
                                </h4>
                                <p> and here</p>

                            </div>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <!-- Callout -->
    
<section>   
    <aside class="img2">
        <div class="text-vertical-center">
          <a href="home.php" class="btn btn-dark btn-lg btn-placement">Sign up now</a>
        </div>
    </aside>
</section>








    <!-- Footer -->
        <section id="footer" class="footer">

    <footer>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Synergy Space</strong>
                    </h4>
                    <p>UofT<br>Toronto Ontario</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i> (123) 456-7890</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="#">SynergySpace@mail.com</a>
                        </li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; csc309 Prj 2015</p>
                    <br>
                </div>
            </div>
    </footer>
</section>



<!-- Scripts -->


<script src="js/plugin/jquery.js"></script>
<script src="js/plugin/bootstrap.min.js"></script>
<script src="js\scroll.js"></script>

</body>	
</html>