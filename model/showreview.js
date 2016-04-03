//alert("review");
function showReview(placeid) {
//alert("rev1");
//alert("2");
    if (placeid.length == 0) { 
		//alert("3");
        document.getElementById("review_panel_right_reviewMessages").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
		//alert("4");
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			//alert("5");
                document.getElementById("review_panel_right_reviewMessages").innerHTML = xmlhttp.responseText;
				
				//alert("6");
            }
        }
        xmlhttp.open("GET", "model/displayreview.php?placeid=" + placeid, true);
		//alert("7");
        xmlhttp.send();
		//alert("8");
    }
}

