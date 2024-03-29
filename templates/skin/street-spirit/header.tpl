<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
    "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">

<html lang="ru">
<head>
	{hook run='html_head_begin'}
	<title>{$sHtmlTitle}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="{$sHtmlDescription}" />
	<meta name="keywords" content="{$sHtmlKeywords}" />
	
    <link href="http://stg.odnoklassniki.ru/share/odkl_share.css" rel="stylesheet">
	<meta property="og:site_name" content="{$sHtmlTitle}"/>
	{if $oTopic && !$bTopicList}
		<meta property="og:title" content="{$oTopic->getTitle()|escape:'html'}"/>
		<meta property="og:url" content="{$oTopic->getUrl()}"/>
		<meta property="og:type" content="article"/>
		<meta property="og:description" content="{$oTopic->getTextShort()|strip_tags}"/>
		{if $oTopic->getImgForMeta()}
		<meta property="og:image" content="{$oTopic->getImgForMeta()}"/>
		{/if}
	{else}
		<meta property="og:title" content="{$sHtmlTitle}"/>
		<meta property="og:url" content="{cfg name='path.root.web'}"/>
		<meta property="og:type" content="blog"/>
		<meta property="og:description" content="{$sHtmlDescription}"/>
		{*<meta property="og:image" content=""/>*}
	{/if}
	{*<meta property="fb:admins" content="USER_ID"/>*}


	{$aHtmlHeadFiles.css}
	<link href="{cfg name='path.static.skin'}/images/favicon.gif" rel="shortcut icon" />


    <!--[if gte IE 7]>
        <link rel="stylesheet" type="text/css" href="{cfg name='path.static.skin'}/css/ie8-and-up.css" />
	<![endif]-->

	<link rel="search" type="application/opensearchdescription+xml" href="{router page='search'}opensearch/" title="{cfg name='view.name'}" />

	{if $aHtmlRssAlternate}
		<link rel="alternate" type="application/rss+xml" href="{$aHtmlRssAlternate.url}" title="{$aHtmlRssAlternate.title}" />
	{/if}

	{if $bRefreshToHome}
		<meta  HTTP-EQUIV="Refresh" CONTENT="3; URL={cfg name='path.root.web'}" />
	{/if}

	<script type="text/javascript">
	var DIR_WEB_ROOT 			= '{cfg name="path.root.web"}';
	var DIR_STATIC_SKIN 		= '{cfg name="path.static.skin"}';
	var DIR_ROOT_ENGINE_LIB     = '{cfg name="path.root.engine_lib"}';
	var LIVESTREET_SECURITY_KEY = '{$LIVESTREET_SECURITY_KEY}';
	var SESSION_ID              = '{$_sPhpSessionId}';
	var BLOG_USE_TINYMCE		= '{cfg name="view.tinymce"}';

	var TINYMCE_LANG='en';
	{if $oConfig->GetValue('lang.current')=='russian'}
		TINYMCE_LANG='ru';
	{/if}

	var aRouter = new Array();
	{foreach from=$aRouter key=sPage item=sPath}
		aRouter['{$sPage}'] = '{$sPath}';
	{/foreach}
	</script>

	{$aHtmlHeadFiles.js}

	<script type="text/javascript">
		var tinyMCE=false;
		ls.lang.load({json var=$aLangJs});
	</script>



	{hook run='html_head_end'}
    
    <!-- Put this script tag to the <head> of your page -->
    <script type="text/javascript" src="http://vkontakte.ru/js/api/share.js?11" charset="windows-1251"></script>
	<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript"></script>
    <script src="http://stg.odnoklassniki.ru/share/odkl_share.js" type="text/javascript" ></script>
</head>


<body onload="prettyPrint();ODKL.init();">
    <div id="fb-root"></div>
	<script src="http://connect.facebook.net/ru_RU/all.js#xfbml=1"></script>

    {literal}

    <script language="JavaScript" type="text/javascript">
    	!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
		//var iFbAppId='{/literal}{cfg name='plugin.openid.fb.id'}{literal}';
		//FB.init({appId: iFbAppId, status: true, cookie: true, xfbml: true});
    </script>

    {/literal}
	{hook run='body_begin'}
	{include file='header_top.tpl'}
	{include file='nav.tpl'}

	<div id="container">
		<div id="wrapper" class="{if $oUserCurrent and $showUpdateButton}show-update-button{/if} {if $showWhiteBack}white-back{/if}">
			<div id="content" {if $noSidebar}class="one-collumn"{/if}>
				<div id="content-inner">

					{include file='window_login.tpl'}
					{include file='system_message.tpl'}

					{hook run='content_begin'}