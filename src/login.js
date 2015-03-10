	$(function() { //Document Ready Function
		var hash = window.location.hash;
		if(hash.indexOf("#user=")==0) {
			var username = window.location.hash.split("=")[1];
			document.getElementById('user').value=username;
		} else if (hash.indexOf("#loggedout")==0) {
			document.getElementById('notification').value="Logged out Successfully.";
		}
	});