<div id="sidebar">
	{assign var="cblink" value="http://teztour.ua"}
	{assign var="cbtext" value="Tez Tour  в Украине"}
	
	{if $oUserCurrent}

		{if $oUserCurrent->getProfileCountry()=="Россия"}
			{assign var="cblink" value="http://teztour.ru"}
			{assign var="cbtext" value="Tez Tour"}
		{/if}	
		{if $oUserCurrent->getProfileCountry()=="Украина"}
			{assign var="cblink" value="http://teztour.ua"}
			{assign var="cbtext" value="Tez Tour в Украине"}
		{/if}	
		{if $oUserCurrent->getProfileCountry()=="Латвия"}
			{assign var="cblink" value="http://teztour.lv"}
			{assign var="cbtext" value="Tez Tour в Латвии"}
		{/if}
		{if $oUserCurrent->getProfileCountry()=="Latvija"}
			{assign var="cblink" value="http://teztour.lv"}
			{assign var="cbtext" value="Tez Tour в Латвии"}
		{/if}
		{if $oUserCurrent->getProfileCountry()=="Белоруссия"}
			{assign var="cblink" value="http://teztour.by"}
			{assign var="cbtext" value="Tez Tour в Белорусии"}
		{/if}
	{/if}
	
	
	<a class="country-banner" href="{$cblink}" style="color:#FFFFFF;" target=_blank>
	<br>{$cbtext}<font size="-2" style='font-size:xx-small;color:"white";'><br>официальный сайт</font>
	</a>
	<br>
	{if isset($aBlocks.right)}
		{foreach from=$aBlocks.right item=aBlock}
			{if $aBlock.type=='block'}
				{insert name="block" block=$aBlock.name params=$aBlock.params}
			{/if}
			{if $aBlock.type=='template'}
				{include file=$aBlock.name params=$aBlock.params}
			{/if}
		{/foreach}
	{/if}

	{if $sAction!='index'} 
	<br> <!--facebook widget-->
	<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fteztourua&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowTransparency="true"></iframe>
	
	{/if}
	
	{if $sAction=='index'} 
	<!-- VK Widget -->
	<div id="vk_groups"></div>
	<script type="text/javascript">
	VK.Widgets.Group("vk_groups", {ldelim}mode: 0, width: "292", height: "292"{rdelim}, 18391532);
	</script>
	{/if}
	<br><br>

</div>