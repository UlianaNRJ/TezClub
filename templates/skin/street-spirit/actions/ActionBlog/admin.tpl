{include file='header.tpl'}
{include file='menu.blog_edit.tpl'}

{if $aBlogUsers}
	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="security_ls_key" value="{$LIVESTREET_SECURITY_KEY}" />
		<table class="table">
				<tr class="table">
					<td>{$aLang.blog_admin_users}</td>
					<td class="width10pc">{$aLang.blog_admin_users_administrator}</td>
					<td class="width10pc">{$aLang.blog_admin_users_moderator}</td>
					<td class="width10pc">{$aLang.blog_admin_users_reader}</td>
					<td class="width10pc">{$aLang.blog_admin_users_bun}</td>
				</tr>

				{foreach from=$aBlogUsers item=oBlogUser}
					{assign var="oUser" value=$oBlogUser->getUser()}
					<tr>
						<td><a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a></td>
						{if $oUser->getId()==$oUserCurrent->getId()}
							<td colspan="3" align="center">{$aLang.blog_admin_users_current_administrator}</td>
						{else}
							<td align="center"><input type="radio" name="user_rank[{$oUser->getId()}]" value="administrator" {if $oBlogUser->getIsAdministrator()}checked{/if} /></td>
							<td align="center"><input type="radio" name="user_rank[{$oUser->getId()}]" value="moderator" {if $oBlogUser->getIsModerator()}checked{/if} /></td>
							<td align="center"><input type="radio" name="user_rank[{$oUser->getId()}]" value="reader" {if $oBlogUser->getUserRole()==$BLOG_USER_ROLE_USER}checked{/if} /></td>
							<td align="center"><input type="radio" name="user_rank[{$oUser->getId()}]" value="ban" {if $oBlogUser->getUserRole()==$BLOG_USER_ROLE_BAN}checked{/if} /></td>
						{/if}
					</tr>
				{/foreach}

		</table>

		<input type="submit" name="submit_blog_admin" value="{$aLang.blog_admin_users_submit}" />
	</form>
	<br />
	{include file='paging.tpl' aPaging=$aPaging}
{else}
	{$aLang.blog_admin_users_empty}
{/if}


{include file='footer.tpl'}