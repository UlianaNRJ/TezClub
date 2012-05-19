
$(document).ready(function(){

	"use strict";

	// decorate all dropdown menus
	$("select").each(function(){
		$(this).selectmenu({
			style: "dropdown", 
			change: function () { 
				// submit to parent form for selector
				$(this).parent().submit();
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
		$("> .description", ".popular").hide().eq($(this).index()).show();
	})

	/* comments */
	var working = false;
	$('#addCommentForm').submit(function(e){

 		e.preventDefault();
		if(working) return false;
		
		working = true;
		$('#submit').val('Working..');
		$('span.error').remove();
		
		$.post('/topic/comment',$(this).serialize(),function(msg){
			working = false;
			$('#submit').val('Отправить');
			
			if(msg.status){
				$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
				$('#comment_text').val('');
			}
			else {
				$.each(msg.errors,function(k,v){
					$('#addCommentContainer h4').append('<span class="error">'+v+'</span>');
				});
			}
		},'json');
	});
});
