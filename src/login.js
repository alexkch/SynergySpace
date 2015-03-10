$(function() { //Document Ready Function
	var hash = window.location.hash;
	hash = hash.split("&"); //All of the URL after the # split on delimiter &
	for (i = 0; i < hash.length; i++) {
		if (hash[i].indexOf("user")==0) { // Fill username textbox
			document.getElementById('user').value=hash[i].split("=")[1];
		} else if (hash[i].indexOf("loggedout")==0) { // Logged out
			document.getElementById('notification').innerHTML="Logged out Successfully.";
		} else if (hash[i].indexOf("error")==0) { // Error messsages
			switch (hash[i].split("=")[1]) {
				case "0":
					document.getElementById('notification').innerHTML="Username or password incorrect.";
					break;
			}
		}
	}
});