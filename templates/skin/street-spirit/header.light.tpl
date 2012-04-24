<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML Basic 1.1//EN"
    "http://www.w3.org/TR/xhtml-basic/xhtml-basic11.dtd">

<html lang="ru">

<head>
	{hook run='html_head_begin'}
	<title>{$sHtmlTitle}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<!--[if gte IE 7]>
        <link rel="stylesheet" type="text/css" href="{cfg name='path.static.skin'}/css/ie8-and-up.css" />
	<![endif]-->
	{$aHtmlHeadFiles.css}

	{if $bRefreshToHome}
		<meta  HTTP-EQUIV="Refresh" CONTENT="3; URL={cfg name='path.root.web'}" />
	{/if}
	{hook run='html_head_end'}

	<script src="http://vkontakte.ru/js/api/openapi.js" type="text/javascript" charset="windows-1251"></script>
</head>

<body>
	<div id="fb-root"></div>
	<script src="http://connect.facebook.net/ru_RU/all.js"></script>
    {literal}

    <script language="JavaScript" type="text/javascript">
		var iFbAppId='{/literal}{cfg name='plugin.openid.fb.id'}{literal}';
		FB.init({appId: iFbAppId, status: true, cookie: true, xfbml: true});
    </script>

    {/literal}
{hook run='body_begin'}
<div id="container">
	<div id="header-light">
		<a href="{cfg name='path.root.web'}" class="logo">Tez<span>Club</span><font color="lightgrey">International</font></a>
	</div>

	{if !$noShowSystemMessage}
		{include file='system_message.tpl'}
	{/if}