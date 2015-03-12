$(function() { //Document Ready Function
	var search = window.location.search;
	search = search.split("&");
	for (i = 0; i < search.length; i++) {
		if (search[i].indexOf("q")!=-1) { // Fill username textbox
			document.getElementById('search-text').value=search[i].split("=")[1].replace(/\+/g, " ");
		}
	}
});