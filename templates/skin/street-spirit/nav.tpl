<div id="nav">
	<div class="nav-inner">
		<div  style="float:right;width: 26%;align:right;">
		<table border=0 valign="middle">
            <tr valign="middle">
                <td valign="middle" style="vertical-align:middle;">
                    <font size="-2" color="lightgrey">Tez Tour в социальных сетях: </font>
                </td>
                <td width="10px">&nbsp</td>
                <td> <a href="http://vk.com/TezTourUA" target="blank"><img src="../../../uploads/vk.png"></a> <a href="http://facebook.com/TezTourUa" target="blank"><img src="../../../uploads/fb.png"></a> <a href="http://www.odnoklassniki.ua/group/50476281757832" target="blank"><img src="../../../uploads/od.png"></a>
                </td>
            </tr>
        </table>
    	</div>


		{if $oUserCurrent and ($sAction=='blog' or $sAction=='index' or $sAction=='new' or $sAction=='personal_blog' or $sAction=='feed' or $sAction=='top')}
			<a href="{router page='topic'}add/" class="button-publish"><span>{$aLang.topic_create}</span></a>
		{/if}


		{if $menu}
			{if in_array($menu,$aMenuContainers)}{$aMenuFetch.$menu}{else}{include file="menu.$menu.tpl"}{/if}
		{/if}
	</div>
</div>
