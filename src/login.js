	$(function() { //Document Ready Function
		if(window.location.hash.localeCompare("#user=")==0) {
			var username = window.location.hash.split("=")[1];
			document.getElementById('user').value=username;
		}
	});