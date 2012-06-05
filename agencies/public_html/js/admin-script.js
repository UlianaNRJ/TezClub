jQuery.noConflict();
jQuery(document).ready(function($){

	"use strict";

	  $(".nav li.active a").click(function(){
		    return false;
	  });

    $("input#latlng").focus(function(){
        $("#map").addClass("shown");
        initializeMap();
        return false;
    });
    $("input#latlng").blur(function(){
        $("#map").removeClass("shown");
        return false;
    });

});


// MAP
var mapInitialized = false;
var marker;
var center;
var map;

function initializeMap() {
  	if (mapInitialized)
  		return;
  	mapInitialized = true;

    var inputVal = jQuery("input#latlng").attr("value").split(",");
    if (inputVal[0] && inputVal[1]) {
        center = new google.maps.LatLng(inputVal[0],inputVal[1]);
        createMap();
        placeMarker(center, map);
    }
    else {
        var city = jQuery("select#city option[value='" + jQuery("select#city").attr("value") + "']").text();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': "Украина, " + city}, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                center = results[0].geometry.location;
              } else {
                alert("Geocode was not successful for the following reason: " + status);
                center = new google.maps.LatLng(50.471519004828835,30.488724401855507);
            }
            createMap();
        });
    }
}

function createMap() {
    var myOptions = {
        zoom: 12,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map"), myOptions);

    google.maps.event.addListener(map, 'click', function(e) {
            placeMarker(e.latLng, map);
          });
}

function placeMarker(position, map) {
    if (!marker) {
        marker = new google.maps.Marker({
            position: position,
            map: map
        });
    }
    else {
        marker.setPosition(position);
    }
    map.panTo(position);
    jQuery("input#latlng").attr("value", position.lat()+","+position.lng())
}

