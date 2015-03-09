<?php
function defaultMenu () {
	echo '<li><a href="/register.php"><span class="fa fa-plus"></span>Create an Account</a></li><li><a href="/login.php"><span class="fa fa-sign-in"></span>Login</a></li>';
}
function userMenu() {
	echo '<li><a href="/profile.php"><span class="fa fa-cogs"></span>My Account</a></li><li><a href="/login.php"><span class="fa fa-sign-out"></span>Logout</a></li>';
}
?>