<?php
function defaultMenu () {
	echo 
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
					<li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li>
					<li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>
				</ul>
			</div>
		</header>';
}
function userMenu() {
	echo 
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
			<span class="nav_trigger">
              				<i class="fa fa-user" style="margin-right:80px;"></i>
          				</span>
			<div id="account">
				<ul>
					<li><a href="/profile.php"><span class="fa fa-cogs"></span>My Account</a></li>			
					<li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>
				</ul>
			</div>
		</header>

		<!-- Sidebar -->
		<div id="push_sidebar">
  			<ul class="list-unstyled">
			    <li><a href="#"><span class="fa fa-home"></span>Home</a></li>
			    <li><a href="#"><span class="fa fa-user"></span>Profile</a></li>
			    <li><a href="#" data-toggle="modal" data-target="#createPrjSidebar"><span class="fa fa-plus"></span>New Project</a></li>
			    <li><a href="#"><span class="fa fa-folder-open-o"></span>Existing Projects</a></li>
			    <li><a href="#"><span class="fa fa-envelope"></span>Messages</a></li>
			    <li><a href="#"><span class="fa fa-bar-chart"></span>Chart</a></li>
			    <li><a href="#"><span class="fa fa-star"></span>Favourites</a></li>
			</ul>
		</div>';
}
?>