function uploadImage() {
	if(window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("img").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","getuser.php?q="+str, true);
	xmlhttp.send();
}