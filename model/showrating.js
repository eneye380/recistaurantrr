//alert("rating");
//document.getElementById("rating").innerHTML. = "1/5.0";
//document.getElementById("rating").style ="color:red";
function showRating(placeid) {
//alert("rat1");
//alert("2");
    if (placeid.length === 0) { 
		//alert("3");
        document.getElementById("rating").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
		//alert("4");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			//alert("5");
				if(xmlhttp.responseText!==0){
					document.getElementById("rating").innerHTML = xmlhttp.responseText;
				}
				else{
					document.getElementById("rating").innerHTML = "rating unavailable";
				}
				//alert("6");
            }
        }
        xmlhttp.open("GET", "model/displayrating.php?placeid=" + placeid, true);
		//alert("7");
        xmlhttp.send();
		//alert("8");
    }
}