$(function() { //Document Ready Function
	var hash = window.location.hash;
	hash = hash.split("&"); //All of the URL after the # split on delimiter &
	for (i = 0; i < hash.length; i++) {
		displayNotes(hash[i]);
	}
	
	/**
	 * PRECOND: function has input String [hash]
	 * POSTCOND: Displays content to the user based on the hash of the page URL
	 */
	function displayNotes(hash) {
		if (hash.indexOf("user")==0) { // Fill username textbox
			document.getElementById('user').value=hash.split("=")[1];
		} else if (hash.indexOf("loggedout")==0) { // Logged out
			document.getElementById('notification').innerHTML="Logged out Successfully.";
		} else if (hash.indexOf("error")==0) { // Error messsages
			switch (hash.split("=")[1]) {
				case "0":
					document.getElementById('notification').innerHTML="Username or password incorrect.";
					break;
			}
		}
	}
});