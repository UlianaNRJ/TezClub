function country_list_action(){

    var objCountry=$('#country_list');
    var objCity=$('#city_list');
    var objCityInput=$('#city_list_input');
    var objCityDiv=$('#city_list_div');
    var objCountryAjax=$('#countryAjax');


    if(objCity.css('display')=="none"){
    	objCityInput.css({display:'none'});
    	objCityInput.attr('name','');
    	objCity.css({display:'block'});
    	objCity.attr('name','profile_city');
    }

    if(objCountry.val()=='_full_list_'){

        ls.ajax(aRouter['ajax']+'countrylist/', {'type':'country', 'full':1}, function(response){
            objCountryAjax.css({display:'none'});
            if (!response.bStateError) {
                objCountry.html(response.sReturn);
                $('#country_list option:first').attr('selected', 'selected');
            } else {
                ls.msg.error(response.sMsgTitle,response.sMsg);
            }
        });

        objCountryAjax.css({display:'block'});
        objCityDiv.css({display:'none'});

    }else if(objCountry.val()!=''){

		var cid=''; 
        cid=$("#country_list option:selected").attr('id').substr(3);

        ls.ajax(aRouter['ajax']+'countrylist/', {'type':'city','full':0, 'cid':cid}, function(response){
            objCountryAjax.css({display:'none'});
            if (!response.bStateError) {
                objCity.html(response.sReturn);
				objCityDiv.css({display:'block'});
            } else {
                objCityDiv.css({display:'none'});
                ls.msg.error(response.sMsgTitle,response.sMsg);
            }
        });

		objCountryAjax.css({display:'block'});
		objCityDiv.css({display:'none'});
    }else{
		objCountryAjax.css({display:'none'});
		objCityDiv.css({display:'none'});
    }
}


function city_list_action(){

    var objCountry=$('#country_list');
    var objCity=$('#city_list');
    var objCityInput=$('#city_list_input');
    var objCountryAjax=$('#countryAjax');
    var objCityDiv=$('#city_list_div');

    if(objCity.val()=='_full_list_'){
        var cid=''; 
        cid=$("#country_list option:selected").attr('id').substr(3);

        ls.ajax(aRouter['ajax']+'countrylist/', {'type':'city', 'full':1, 'cid':cid}, function(response){
            objCountryAjax.css({display:'none'});
            if (!response.bStateError) {
                objCity.html(response.sReturn);
                objCityDiv.css({display:'block'});
                $('#city_list option:first').attr('selected', 'selected');
            } else {
                objCityDiv.css({display:'none'});
                ls.msg.error(response.sMsgTitle,response.sMsg);
            }
        });
        objCountryAjax.css({display:'block'});
		objCityDiv.css({display:'none'});

    }else if(objCity.val()=='_other_name_'){
    	objCity.css({display:'none'});
    	objCity.attr('name','');
    	objCityInput.css({display:'block'});
    	objCityInput.attr('name','profile_city');
    	objCityInput.focus();
    }
}