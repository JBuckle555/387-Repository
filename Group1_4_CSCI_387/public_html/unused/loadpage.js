function loadpage(){
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
		}
		else{
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
		}
		if (xmlhttp.readyState ==4 && xmlhttp.status == 200){
		xmlhttp.onreadystatechange = function(){
			document.getElementById('.content').innerHTML = xmlhttp.responseText;
		}
}
xmlhttp.open('GET', 'profile.php',true);
xmlhttp.send();
}