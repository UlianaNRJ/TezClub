jQuery.noConflict();
jQuery(document).ready(function($){

	"use strict";

	// decorate all dropdown menus
	$("select").each(function(){
		$(this).selectmenu();
	});

	// фильтр по метро
	$("select#filter-metro").selectmenu({
		change:function() {
			$("#offices_list .item").removeClass("hidden");
			var metro_id = $(this).val();
			if (metro_id) {
				$("#offices_list .item:not(.metro-"+metro_id+")").addClass("hidden");
			}
			filterMarkers(metro_id);
		}
	});

	$(".offices_tabs a").click(function(e){
		e.preventDefault();
		var item = $(this).attr("href");
		if ($(item).is(".shown"))
			return;

        $(".offices_tabs a").removeClass("active");
        $(this).addClass("active");
        $(".shown").removeClass("shown");
        $($(this).attr("href")).addClass("shown");
        if (item == "#offices_map")
        	initializeMap();
    });

    $("a.showmap").click(function(e){
    	e.preventDefault();
    	activeOfficeId = $(this).attr("href");
    	$(".offices_tabs a[href='#offices_map']").click();
    });

    $("#map_popup .close").click(function(e){
    	hidePopup();
    });

});


// MAP
var activeOfficeId;
var mapInitialized = false;
var map;
var center;
var markers = {};
var activeMarker;
var markerImage;
var markerActiveImage;
var markerShadowImage;
var markerShape;

function initializeMap() {
	if (mapInitialized) {
		if (activeOfficeId)
			setActiveMarker(markers[activeOfficeId]);
		return;
	}
	mapInitialized = true;

	markerImage = new google.maps.MarkerImage('/img/map_marker.png',
      	new google.maps.Size(36, 50),
      	new google.maps.Point(0,0),
      	new google.maps.Point(17, 48)
    );
	markerActiveImage = new google.maps.MarkerImage('/img/map_marker_active.png',
      	new google.maps.Size(36, 50),
      	new google.maps.Point(0,0),
      	new google.maps.Point(17, 48)
    );
	markerShadowImage = new google.maps.MarkerImage('/img/map_marker_shadow.png',
      	new google.maps.Size(42, 24),
      	new google.maps.Point(0,0),
      	new google.maps.Point(12, 23)
    );
    markerShape = {
	    coord: [1, 1, 1, 36, 37, 36, 37, 1],
	    type: 'poly'
	};

	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({ 'address': "Украина, " + currentCity }, function(results, status) {
      	if (status == google.maps.GeocoderStatus.OK) {
        	center = results[0].geometry.location;
        	createMap();
      	} else {
        	alert("Geocode was not successful for the following reason: " + status);
        	center = new google.maps.LatLng(0,0);
        	createMap();
    	}
	});
}

function createMap() {
    var myOptions = {
        zoom: 12,
        center: center,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    createMarkers();
}

//создаем маркеры
function createMarkers() {
	var metro_id = jQuery("select#filter-metro").selectmenu().val();
	for (var key in offices) {
	    var office = offices[key];
	    var myLatLng = new google.maps.LatLng(office["lat"], office["lng"]);
	    var marker = new google.maps.Marker({
	        position: myLatLng,
	        map: map,
	        shadow: markerShadowImage,
	        icon: markerImage,
	        shape: markerShape,
	        title: office["title"],
	        zIndex: 1,
	        visible: (!metro_id || metro_id == office["metro_id"]) ? true : false
	    });
	    markers[key] = marker;
	    attachMarkerEvent(marker);
	}
	if (activeOfficeId)
		setActiveMarker(markers[activeOfficeId]);
}

function attachMarkerEvent(marker) {
    google.maps.event.addListener(marker, 'click', function() {
    	setActiveMarker(marker);
    });
}

// выделяем маркер и показваем попап
function setActiveMarker(marker) {
	if (activeMarker) {
		activeMarker.setIcon(markerImage);
		activeMarker.setZIndex(1);
	}
	if (!marker) {
		activeMarker = null;
		jQuery("#map_popup").css("display","none")
		return
	}
	marker.setIcon(markerActiveImage);
	marker.setZIndex(100);
	activeMarker = marker;
	map.panTo(marker.getPosition());
	for (var key in markers) {
		if (marker === markers[key]) {
			showPopup(key);
			break;
		}
	}
}

function filterMarkers(metro_id) {
	setActiveMarker();
	for (var key in markers) {
		if (offices[key]["metro_id"] == metro_id || !metro_id) {
			markers[key].setVisible(true);
		}
		else {
			markers[key].setVisible(false);	
		}
	}
}

// наполняем попам текстом и отображаем
function showPopup(id) {
	var map_popup 	= jQuery("#map_popup");
	var office 		= offices[id];
	var content = '';
	if (office["title"])
		content += '<div class="item-title">' + office["title"] + '</div>';
	if (office["address"])
		content += '<div class="item-address">' + office["address"] + '</div>';
	if (office["metro"])
		content += '<p class="item-metro">' + office["metro"] + '</p>';
	if (office["time"])
		content += '<p class="item-time">' + office["time"] + '</p>';
	if (office["phones"])
		content += '<p class="item-phone">' + office["phones"] + '</p>';
	if (office["infocenter"])
		content += '<p class="item-infocenter">' + office["infocenter"] + '</p>';
	if (office["mail"])
		content += '<p class="item-mail"><a href="mailto:' + office["mail"] + '">' + office["mail"] + '</a></p>';
	if (office["skype"])
		content += '<p class="item-skype">' + office["skype"] + '</p>';

	map_popup.find(".item-info").html(content);
	var infoBox = new InfoBox({latlng: markers[id].getPosition(), map: map});
	//map_popup.addClass("shown");
}
function hidePopup() {
	jQuery("#map_popup").removeClass("shown");
	jQuery("#map_popup").css("display","none");
	setActiveMarker();
}