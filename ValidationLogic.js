/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//alert("val");

document.getElementById("spec").checked = true;
document.getElementById("locationpara").disabled=false;
function radiocheck(){
alert("v1");
	if(document.getElementById("curr").checked == true)
	{
		document.getElementById("locationpara").disabled=true;
		findCurrentLocation();
	}
	else if( document.getElementById("spec").checked == true)
	{
		document.getElementById("locationpara").disabled=false;
	}
}


function getSearchParameter(form){	
alert("v2");
	var failmsg = "";
	/**if(form.search_area.value==""){
		alert("Select a Search Area");
		return false;
	}
	if(form.search_area.value==""){
		alert("Select a Search Area");
		return false;
	}*/
	
	if(form.meal_type.value==""){
		alert("Select a Meal Type");
		return false; 
	}
	
	if(form.search_area.value=="b"){
	failmsg += validateLocation(form.location.value);
	}
	
	if(failmsg ==""){
		
		var key = form.meal_type.value;
		var min;
		var max;
		
		if(form.price.value=="0"){min = 0;max = 1;}
		else if(form.price.value=="1"){min = 1;max = 1;}
		else if(form.price.value=="2"){min = 1;max = 2;}
		else if(form.price.value=="3"){min = 2;max = 3;}
		else if(form.price.value=="4"){min = 3;max = 4;}
		else if(form.price.value=="5"){min = 0;max = 0;}
		
		trigger(key,min,max);
		form.location.value = "";
		document.getElementById('restaurant_name').innerHTML = " ";
		document.getElementById("spec").checked = true;
		document.getElementById("locationpara").disabled=false;
		document.getElementById("break").checked = false;
		document.getElementById("lunc").checked = false;
		document.getElementById("dinn").checked = false;
		
		return false;
	}
	else{
		alert(failmsg);
		return false;
	}	
}

function validateLocation(data){
alert("v3");
	if(data==""){
		return "please enter a location";
	}
	/**else if(/[^a-zA-Z0-9]/.test(data)){
		return " invalid characters";
	}*/
	else return "";
}

