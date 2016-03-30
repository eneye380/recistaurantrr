/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//alert("map");
var x;
var map;
var map5;
var infowindow;
var service;
var bounds;
var currentPosition;
var plc_id;
var name;

function onloadCurrentLocation() {
	x=document.getElementById("msg12");
	alert("m1");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showOnloadPosition, showError);
		//alert("me");
	} else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
		
    }
	//initialize();//2	
}
function findCurrentLocation() {
	x=document.getElementById("msg12");
	alert("m2");
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showFindPosition, showError);
		//alert("me");
		return true;
	} else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
		
    }
	//initialize();//2	
}
//
function showOnloadPosition(position) {
	alert("m3");
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    currentPosition = new google.maps.LatLng(lat, lon);	
	initialize();
}
function showFindPosition(position) {
	alert("m4");
    lat = position.coords.latitude;
    lon = position.coords.longitude;
    currentPosition = new google.maps.LatLng(lat, lon);	
	//initialize();
}
//
function showError(error) {
alert("m5");
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}
//
 function initialize() {	
	//
	alert("m6");
	var mapProp = {	   
     center: currentPosition,
     zoom:9,
     mapTypeId:google.maps.MapTypeId.ROADMAP
   };      
   //   
   map5 = new google.maps.Map(document.getElementById("googleMap"),mapProp);     
   //   
	var marker5 = new google.maps.Marker({
	   position:currentPosition,
	   animation:google.maps.Animation.BOUNCE	   
   });     
    // 
   marker5.setMap(map5);    
   //
   var infowindow5 = new google.maps.InfoWindow({
		content: "My Approximate Current Position",		
   });
   //
   infowindow5.open(map5,marker5); 
   loadInputAutocomplete();//3 
   
 } 
 /**
 MAP1///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 */ 
function trigger(key,min,max) {  
alert("m7");
  //var garthdee = new google.maps.LatLng(57.1509, -2.2307);

  map = new google.maps.Map(document.getElementById('googleMap'), {
    center: currentPosition,	
    zoom: 9
  });
	bounds = new google.maps.LatLngBounds();
	bounds.extend(currentPosition);
	map.fitBounds(bounds);

  var request = {
    location:currentPosition,	
    radius: 50000,
	keyword: key,	
	minPriceLevel: min,
	maxPriceLevel: max,
    types: ['restaurant','cafe','meal_delivery','meal_takeaway','asian','food','drink']
	
  };
  //
   var marker1=new google.maps.Marker({
	   position: currentPosition,
	   animation: google.maps.Animation.BOUNCE,
	   title: "My Radius Center"	   
   });   
    // 
   marker1.setMap(map); 
   //
  service = new google.maps.places.PlacesService(map); //service:PlacesService
  service.nearbySearch(request, callback);
}
//
function callback(results, status) {
alert("m8");
  if (status == google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {      
	  getResultDetails(results[i]);	  
    }
  }
}
//
function getResultDetails(result){
alert("m9");
	var placeLoc = result.geometry.location; //lat lng coordinates
	bounds.extend(placeLoc);
	map.fitBounds(bounds);
	//a place details request variable
	var request = {
		placeId: result.place_id
	};
	//
	infowindow = new google.maps.InfoWindow();
	service = new google.maps.places.PlacesService(map); //service:PlacesService
	//a PlaceService method to Retrieves details about the Place identified by the given placeId
	var name;
	service.getDetails(request, function(place, status) {
	alert("m10");
		if (status == google.maps.places.PlacesServiceStatus.OK) {
			var marker = new google.maps.Marker({
			map: map,
			position: place.geometry.location
		});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.setContent("<b>Name:</b> "+place.name+"<br><b>Address:</b> "+place.formatted_address+"<br> <b>Phone Number: </b>"+place.formatted_phone_number+"<br> <b>Price Level:</b> "+place.price_level);
			infowindow.open(map, this);
			plc_id = result.place_id;
			name = place.name;
			document.getElementById('restaurant_name').innerHTML = place.name;			
			document.getElementById('restaurant_name_1').value = name;			
			document.getElementById('placeid').value = plc_id;
			document.getElementById("hint").innerHTML = "enter review here";
			showReview(plc_id);
			showRating(plc_id);
		});
		}
	});
 }
/**
MAP2/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
*/
function loadInputAutocomplete() {  
alert("m10");
  var input = /** @type {HTMLInputElement} */(
      document.getElementById('locationpara'));  

  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map5);  
  //
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
  //
    var place = autocomplete.getPlace();
    //
	//alert(place.geometry.location);
	currentPosition = new google.maps.LatLng(place.geometry.location.lat(), place.geometry.location.lng());
	//alert("Coordinate: "+currentPosition);
    //
  });
//  
}
 //google.maps.event.addDomListener(window, 'load', findLocation);
 google.maps.event.addDomListener(window, 'load', onloadCurrentLocation);
 //alert("loading...");
