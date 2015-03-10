$(function() { //Document Ready Function
	var hash = window.location.hash;
	hash = hash.split("&");
	for (i = 0; i < hash.length; i++) {
		if(hash[i].indexOf("user=")==0) {
			document.getElementById('user').value=hash[i].split("=")[1];
		} else if (hash[i].indexOf("loggedout")==0) {
			document.getElementById('notification').value="Logged out Successfully.";
		} else if (hash[i].indexOf("error")==0) {
			switch (hash[i].split("=")[1]) {
				case "0":
					document.getElementById('notification').value="Username or password taken.";
					break;
			}
		}
	}
});