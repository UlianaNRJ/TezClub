
$(document).ready(function(){

	"use strict";

	// decorate all dropdown menus
	$("select").each(function(){
		$(this).selectmenu({
			style: "dropdown", 
			change: function () { 
			$("form").submit(); 
			}
		})
		.selectmenu("widget") // returns only first menuWidget thats why i use each
		.addClass("right")
		.end()
		.selectmenu("menuWidget") // returns only first menuWidget thats why i use each
		.addClass("overflow");
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
		$("> p", ".popular").hide().eq($(this).index()).show();
	})

});