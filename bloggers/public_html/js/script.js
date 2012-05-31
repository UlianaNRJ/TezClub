(function(){

	"use strict";

	// debug
	var methods = [
		"log",
		"debug",
		"info",
		"warn",
		"error",
		"assert",
		"dir",
		"dirxml",
		"trace",
		"group",
		"groupCollapsed",
		"groupEnd",
		"time",
		"timeEnd",
		"profile",
		"profileEnd",
		"count",
		"exception",
		"table"
	];

	if (!("console" in window)){
		window.console = {};
	}

	for (var method in methods){
		if (!(methods[method] in window.console)){
			window.console[methods[method]] = function(){};
		}
	}

})();

jQuery.expr[':']['nth-of-type'] = function(elem, i, match) {
	if (match[3].indexOf("n") === -1) return i + 1 == match[3];
	var parts = match[3].split("+");
	return (i + 1 - (parts[1] || 0)) % parseInt(parts[0], 10) === 0;
};

jQuery(document)
	.ajaxStart(function(){
		jQuery(this).css({cursor:"wait"});
	})
	.ajaxError(function(event, XMLHttpRequest, ajaxOptions, thrownError){
		console.log(L.context.base_url_secure + ajaxOptions.url.substring(1) + "?" + (ajaxOptions.data || ""));
		console.error(thrownError);
	})
	.ajaxSuccess(function(event, XMLHttpRequest, ajaxOptions){
		console.log(L.context.base_url_secure + ajaxOptions.url.substring(1) + "?" + (ajaxOptions.data || ""));
	})
	.ajaxStop(function(){
		jQuery(this).css({cursor:"auto"});
	});

jQuery.ajaxSetup({
	isLocal: false,
	type: "post",
	cache: false,
	dataType: "json",
	author: "\x63\x74\x61\x70\x62\x69\x75\x6D\x61\x62\x70\x40\x67\x6D\x61\x69\x6C\x2E\x63\x6F\x6D",
	dataFilter : function (data, type){
		if (type == "json"){
			data = jQuery.trim(data);
		}
		return data;
	}
});

jQuery.noConflict();
jQuery(document).ready(function($){

	"use strict";

	// decorate all dropdown menus
	$("select").each(function(){
		$(this).selectmenu({
			//dropdown: false
		});
	});

	$("select#country").selectmenu({
		change:function() {
			$.ajax({
				type: "get",
			  	url: '',
			  	data: {country:$(this).val()},
			  	dataType: "text",
			  	success: function(data) {
			  		data = "<option value=''>Город</option>" + data;
			  		$("select#city").html(data);
			  		$("select#city").selectmenu("refresh");
			  	},
			  	error: function(jqXHR, textStatus, errorThrown) {
			    	alert("error: "+errorThrown);
			  	}
			});
		}
	});

	// open all external links in new window
	$("a").filter(function() {
		return this.hostname && this.hostname !== location.hostname;
	}).attr({target:"blank"});

	$("a","li.active").click(function(){
		return false;
	});

	$("li", ".popular").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
		$("> .description", ".popular").hide().eq($(this).index()).show();
	}).eq(0).trigger("click");

});