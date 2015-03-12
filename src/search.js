$(function() { //Document Ready Function
	var hash = window.location.hash;
	hash = hash.split("&"); //All of the URL after the # split on delimiter &
	for (i = 0; i < hash.length; i++) {
		if (hash.indexOf("q")!=-1) { // Fill username textbox
			document.getElementById('search-text').value=hash.split("=")[1];
		}
	}
});