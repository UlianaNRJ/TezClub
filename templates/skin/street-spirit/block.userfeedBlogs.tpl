{if $oUserCurrent}
<div class="block stream-settings">
	<div class="block-header-conteiner"><h2><span>{$aLang.userfeed_block_blogs_title}</span></h2></div>
	
	<p class="sp-note">{$aLang.userfeed_settings_note_follow_blogs}</p>

	{if count($aUserfeedBlogs)}
		<ul class="stream-settings-blogs">
			{foreach from=$aUserfeedBlogs item=oBlog}
				{assign var=iBlogId value=$oBlog->getId()}
				<li><input class="userfeedBlogCheckbox input-checkbox"
							type="checkbox"
							{if isset($aUserfeedSubscribedBlogs.$iBlogId)} checked="checked"{/if}
							onClick="if (jQuery(this).attr('checked')) { ls.userfeed.subscribe('blogs',{$iBlogId}) } else { ls.userfeed.unsubscribe('blogs',{$iBlogId}) } " />
					<a href="{$oBlog->getUrlFull()}">{$oBlog->getTitle()|escape:'html'}</a>
				</li>
			{/foreach}
		</ul>
	{else}
             <p>{$aLang.userfeed_no_blogs}</p>
        {/if}
</div>
{/if}