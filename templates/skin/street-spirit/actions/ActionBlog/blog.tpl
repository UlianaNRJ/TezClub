{include file='header.tpl' menu='blog'}
{assign var="oUserOwner" value=$oBlog->getOwner()}
{assign var="oVote" value=$oBlog->getVote()}



{if $oUserCurrent and $oUserCurrent->isAdministrator()}
	<form id="blog_delete_form" class="blog-delete-form jqmWindow" action="{router page='blog'}delete/{$oBlog->getId()}/" method="post">
		<a href="#" class="close jqmClose"></a>
	
		<p>{$aLang.blog_admin_delete_move}</p>
		<p><select name="topic_move_to">
			<option value="-1">{$aLang.blog_delete_clear}</option>
			{if $aBlogs}
				<optgroup label="{$aLang.blogs}">
					{foreach from=$aBlogs item=oBlogDelete}
						<option value="{$oBlogDelete->getId()}">{$oBlogDelete->getTitle()}</option>
					{/foreach}
				</optgroup>
			{/if}
		</select></p>
		
		<input type="hidden" value="{$LIVESTREET_SECURITY_KEY}" name="security_ls_key" />
		<input type="submit" value="{$aLang.blog_delete}" />
	</form>
{/if}



<div class="blog">
	

	<div class="blog-header">
        {if $oUserCurrent and $oUserCurrent->getId()!=$oBlog->getOwnerId()}
            <div onclick="ls.blog.toggleJoin(this,{$oBlog->getId()}); return false;" class="join "><span>{if $oBlog->getUserIsJoin()}{$aLang.blog_leave_now}{else}{$aLang.blog_join_now}{/if}</span></div>
        {/if}
		<h2 id="show_blog_info"><a href="#">{$oBlog->getTitle()|escape:'html'}</a> </h2>
		<a href="{router page='rss'}blog/{$oBlog->getUrl()|escape:'html'}/" class="rss"></a>
	</div>
	
	
	<ul class="actions">
		{if $oUserCurrent and ($oUserCurrent->getId()==$oBlog->getOwnerId() or $oUserCurrent->isAdministrator() or $oBlog->getUserIsAdministrator() )}
			<li>
				<a href="{router page='blog'}edit/{$oBlog->getId()}/" title="{$aLang.blog_edit}" class="edit">{$aLang.blog_edit}</a></li>
				{if $oUserCurrent->isAdministrator()}
					<li><a href="#" title="{$aLang.blog_delete}" id="blog_delete_show" class="delete">{$aLang.blog_delete}</a>
				{else}
					<a href="{router page='blog'}delete/{$oBlog->getId()}/?security_ls_key={$LIVESTREET_SECURITY_KEY}" title="{$aLang.blog_delete}" onclick="return confirm('{$aLang.blog_admin_delete_confirm}');" >{$aLang.blog_delete}</a>
				{/if}
			</li>
		{/if}
	</ul>
	
	
	<div class="blog-info" id="blog_info">
		<h2><span>{$aLang.blog_about}</span></h2>
		<div id="vote_area_blog_{$oBlog->getId()}" class="voting {if $oBlog->getRating()>=0}positive{else}negative{/if} {if !$oUserCurrent || $oBlog->getOwnerId()==$oUserCurrent->getId()}guest{/if} {if $oVote} voted {if $oVote->getDirection()>0}plus{elseif $oVote->getDirection()<0}minus{/if}{/if}">
			<div class="text">{$aLang.blog_rating}</div>
			<a href="#" class="plus" onclick="return ls.vote.vote({$oBlog->getId()},this,1,'blog');"></a>
			<div id="vote_total_blog_{$oBlog->getId()}" class="total" title="{$aLang.blog_vote_count}: {$oBlog->getCountVote()}">{$oBlog->getRating()}</div>
			<a href="#" class="minus" onclick="return ls.vote.vote({$oBlog->getId()},this,-1,'blog');"></a>
			<div class="text">{$aLang.blog_vote_count}: <span>{$oBlog->getCountVote()}</span></div>
		</div>
		<div class="blog-info-text">{$oBlog->getDescription()|nl2br}</div>			
		
		
		<div class="blog-wrapper">
			<div class="blog-admins">
				<h3>{$aLang.blog_user_administrators} ({$iCountBlogAdministrators})</h3>
				<ul class="user-list">
					<li>
						<a href="{$oUserOwner->getUserWebPath()}"><img src="{$oUserOwner->getProfileAvatarPath(24)}" alt="avatar" title="{$oUserOwner->getLogin()}"/></a>
						<a href="{$oUserOwner->getUserWebPath()}">{$oUserOwner->getLogin()}</a>
					</li>
					{if $aBlogAdministrators}			
						{foreach from=$aBlogAdministrators item=oBlogUser}
							{assign var="oUser" value=$oBlogUser->getUser()}
							<li>
								<a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt=""  title="{$oUser->getLogin()}"/></a>
								<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>
							</li>
						{/foreach}	
					{/if}	
				</ul>
			</div>
			<div class="blog-mods">
				<h3>{$aLang.blog_user_moderators} ({$iCountBlogModerators})</h3>
				{if $aBlogModerators}
					<ul class="user-list">
						{foreach from=$aBlogModerators item=oBlogUser}  
						{assign var="oUser" value=$oBlogUser->getUser()}								
							<li>
								<a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt=""  title="{$oUser->getLogin()}"/></a>
								<a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>
							</li>
						{/foreach}	
					</ul>					
				{else}
					{$aLang.blog_user_moderators_empty}
				{/if}
			</div>
		</div>

		
		
		<div class="blog-wrapper">
			<h3>{$aLang.blog_user_readers} ({$iCountBlogUsers})</h3>
			{if $aBlogUsers}
				<ul  class="user-list">
				{foreach from=$aBlogUsers item=oBlogUser}
				{assign var="oUser" value=$oBlogUser->getUser()}
					<li>
						<a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt=""  title="{$oUser->getLogin()}"/></a>
						<a href="{$oUser->getUserWebPath()}" class="">{$oUser->getLogin()}</a>
					</li>
				{/foreach}
				</ul>
				{if count($aBlogUsers)<$iCountBlogUsers}
					<br /><br /><a href="{$oBlog->getUrlFull()}users/">{$aLang.blog_user_readers_all}</a>
				{/if}
			{else}
				{$aLang.blog_user_readers_empty}
			{/if}	
		</div>
        <div class="bloch-hlide-line"><span><a id="toggle-blog-info" href="#">Свернуть</a></span></div>
	</div>
</div>


{if $bCloseBlog}
	<div class="padding">{$aLang.blog_close_show}</div>
{else}
	{include file='topic_list.tpl'}
{/if}


{include file='footer.tpl'}