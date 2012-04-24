<div id="vk_api_transport"></div>
{*
<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>

<div id="fb-root"></div>
<script src="http://connect.facebook.net/ru_RU/all.js"></script>
*}
<font color="lightgrey">Использовать социальные профили: </font><br><a href="javascript:openid_fb()"><img src="../../../../uploads/fb.png" alt="facebook" rel="open_facebook" /></a>
<!---<a href="javascript: openid_twitter()"><img src="../../../../uploads/fb.png" alt="twitter" width="151px" height="24px" /></a>-->
<a href="javascript:openid_vk()"><img src="../../../../uploads/vk.png" alt="vkontakte" /></a>
<br><br>
<script language="JavaScript" type="text/javascript">
var sVkTransportPath='{cfg name='plugin.openid.vk.transport_path'}';
var iVkAppId='{cfg name='plugin.openid.vk.id'}';
var iFbAppId='{cfg name='plugin.openid.fb.id'}';
var sVkLoginPath='{$aRouter.login}'+'openid/vk/';
var sFbLoginPath='{$aRouter.login}'+'openid/fb/';
var sTwitterLoginPath='{$aRouter.login}'+'openid/twitter/?authorize=1';
{literal}
	function getEl(id) {
		return document.getElementById(id);
	}

	function openid_yandex() {
		getEl('open_login').value='openid.yandex.ru';		
		getEl('openid_form').submit();
	}
	
	function openid_rambler() {
		getEl('open_login').value='rambler.ru';		
		getEl('openid_form').submit();
	}
	
	function openid_google() {
		getEl('open_login').value='https://www.google.com/accounts/o8/id';		
		getEl('openid_form').submit();
	}
	
	function openid_vk() {		
		VK.Auth.getLoginStatus(function(response) {
			if (response.session) {
				window.location = sVkLoginPath;
			} else {
				VK.Auth.login(function(response) {
					if (response.session) {
						window.location = sVkLoginPath;
					}
				},VK.access.FRIENDS);				
			}
		});
	}
	
	function openid_fb() {
		FB.getLoginStatus(function(response) {
			if (response.session) {
				window.location = sFbLoginPath;
			} else {
				FB.login(null,{scope:'read_stream,publish_stream,offline_access,email'});
				FB.login(function(response) {
					if (response.session) {
					window.location = sFbLoginPath;
					}
				});
			}
		});
	}
	
	function openid_twitter() {
		window.location = sTwitterLoginPath;
	}
	
	
	//FB.init({appId: iFbAppId, status: true, cookie: true, xfbml: true});

	//VK.init({apiId: iVkAppId, nameTransportPath: sVkTransportPath});
	

</script>
{/literal}

<!--<a href="{router page='login'}openid/" title="{$aLang.openid_enter_title_alter}" ><img src="{$sTemplateWebPathPlugin}img/openid.png" alt="{$aLang.openid}" style="margin-bottom: 10px;"/></a><br>-->
