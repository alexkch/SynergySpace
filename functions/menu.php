<?php
function defaultMenu () {
	echo 
		'<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

      <div class="row">
          
  <div class="col-md-2">
  <span class="nav_header">
    <a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
  </span>
  </div>

        <div class="col-md-2">     
          <span class="nav_header">
              <a href="/register.php"><i class="fa fa-user-plus" style="margin-right:80px;"></i></a>
          </span>

          <span class="nav_link">
            <a href="/login.php"><i class="fa fa-sign-in"></i></a>
          </span>
        </div>

        <div class="col-md-6">
            <form class="navbar-form" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for new startups" style="width:500px;">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <div class="col-md-2">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="fa fa-question-circle"></span> FAQ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog"></i> About Us</a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><span class="fa fa-facebook-square"></span> Our Facebook</a></li>
                      <li><a href="#"><span class="fa fa-twitter-square"></span> Our Twitter</a></li>
                    <li><a href="#"><span class="fa fa-youtube-play"></span> Our Youtube</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="fa fa-envelope-o"></span> Contact Us</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="fa fa-info-circle"></span> About Us</a></li>
                </ul>
              </li>
          </ul>
      </div>

      </div>
  </div>
</nav>';
}
function userMenu() {
	echo '<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">

      <div class="row">
          
	<div class="col-md-2">
    <span class="nav_header">
		<a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
	  </span>
  </div>

      <div class="col-md-2">     
          <span class="nav_trigger">
              <i class="fa fa-user" style="margin-right:80px;"></i>
          </span>

          <span class="nav_link">
            <a href="/login.php"><i class="fa fa-power-off"></i></a>
          </span>
        </div>

        <div class="col-md-6">
            <form class="navbar-form" role="search">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search for new startups" style="width:500px;">
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>

        <div class="col-md-2">
          <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="fa fa-question-circle"></span> FAQ</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-cog"></i> About Us</a>
                  <ul class="dropdown-menu" role="menu">
                      <li><a href="#"><span class="fa fa-facebook-square"></span> Our Facebook</a></li>
                      <li><a href="#"><span class="fa fa-twitter-square"></span> Our Twitter</a></li>
                    <li><a href="#"><span class="fa fa-youtube-play"></span> Our Youtube</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="fa fa-envelope-o"></span> Contact Us</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><span class="fa fa-info-circle"></span> About Us</a></li>
                </ul>
              </li>
          </ul>
      </div>

      </div>
  </div>
</nav>
<!-- ./bottom menu bar -->

<!-- Sidebar -->
<div id="push_sidebar">
  <ul class="list-unstyled">
    <li><a href="/"><span class="fa fa-home"></span>Home</a></li>
    <li><a href="/profile.php"><span class="fa fa-user"></span>Profile</a></li>
    <li><a href="/newbuilding.php"><span class="fa fa-plus"></span>Post New Space</a></li>
	<li><a href="/updateuser.php"><span class="fa fa-pencil"></span>Update Account Information</a></li>
	<li><a href="/changepass.php"><span class="fa fa-unlock-alt"></span>Change Account Password</a></li>
	<li><a href="/delete.php"><span class="fa fa-trash-o"></span>Delete Account</a></li>
  </ul>
</div>';


		/* OLD DEFAULT ONES
<header>
      <a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
      <div id="search-box">
        <form action="/search.php" id="search-form" method="get" target="_top">
          <input id="search-text" name="q" placeholder="Search by address" type="text" autocomplete=off/>
          <button id="search-button" type="submit">                     
            <span class="fa fa-search"></span>
          </button>
        </form>
      </div>
      <div id="account">
        <ul>
          <li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li>
          <li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>
        </ul>
      </div>
    </header>'


				'<header>
			<a href="/index.php"><span class="fa fa-connectdevelop fa-2x"></span><span>SynergySpace</span></a>
			<div id="search-box">
				<form action="/search.php" id="search-form" method="get" target="_top">
					<input id="search-text" name="q" placeholder="Search by address" type="text" autocomplete=off/>
					<button id="search-button" type="submit">                     
						<span class="fa fa-search"></span>
					</button>
				</form>
			</div>
			
			<div id="account">
				<ul>
					<li><a href="/profile.php"><span class="fa fa-cogs"></span>My Account</a></li>			
					<li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>
					<li><a class="nav_trigger" href="#"><span class="fa fa-user"></span>Menu</a></li>
				</ul>
			</div>
		</header>
*/
}
?>
