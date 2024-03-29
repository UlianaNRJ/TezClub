{include file='header.tpl' menu="profile"}

{assign var="oSession" value=$oUserProfile->getSession()}
{assign var="oVote" value=$oUserProfile->getVote()}

<div class="user-profile">
	<!---<div class="strength">
		<div class="text">{$aLang.user_skill}</div>
		<div class="total" id="user_skill_{$oUserProfile->getId()}">{$oUserProfile->getSkill()}</div>
	</div>-->


	<div id="vote_area_user_{$oUserProfile->getId()}" class="voting {if $oUserProfile->getRating()>=0}positive{else}negative{/if} {if !$oUserCurrent || $oUserProfile->getId()==$oUserCurrent->getId()}guest{/if} {if $oVote} voted {if $oVote->getDirection()>0}plus{elseif $oVote->getDirection()<0}minus{/if}{/if}">
		<div class="text">{$aLang.blog_rating}</div>
		<a href="#" class="plus" onclick="return ls.vote.vote({$oUserProfile->getId()},this,1,'user');"></a>
		<div id="vote_total_user_{$oUserProfile->getId()}" class="total" title="{$aLang.user_vote_count}: {$oUserProfile->getCountVote()}">{$oUserProfile->getRating()}</div>
		<a href="#" class="minus" onclick="return ls.vote.vote({$oUserProfile->getId()},this,-1,'user');"></a>
		<div class="text">{$aLang.blog_vote_count}: <span>{$oUserProfile->getCountVote()}</span></div>
	</div>


	<img src="{$oUserProfile->getProfileAvatarPath(100)}" alt="avatar" class="avatar" />
	<h3>{$oUserProfile->getLogin()}</h3>
	{if $oUserProfile->getProfileName()}
		<p class="realname">{$oUserProfile->getProfileName()|escape:'html'}	</p>
	{/if}
	<div class="profile-actions">
	{if $oUserCurrent && $oUserCurrent->getId()!=$oUserProfile->getId()}

			<ul id="profile_actions">
				{include file='actions/ActionProfile/friend_item.tpl' oUserFriend=$oUserProfile->getUserFriend()}
				<li><a href="{router page='talk'}add/?talk_users={$oUserProfile->getLogin()}"><span class="mail-ico">&nbsp;</span>{$aLang.user_write_prvmsg}</a></li>
			</ul>

	{/if}
	</div>

</div>


{if $oUserProfile->getProfileSex()!='other' || $oUserProfile->getProfileBirthday() || ($oUserProfile->getProfileCountry() || $oUserProfile->getProfileRegion() || $oUserProfile->getProfileCity()) || $oUserProfile->getProfileAbout() || $oUserProfile->getProfileSite() || count($aUserFields)}
	<h2 class="user-profile-header"><span>{$aLang.profile_privat}</span></h2>

	<table class="user-profile-table">
		{if $oUserProfile->getProfileSex()!='other'}
			<tr>
				<td class="var">{$aLang.profile_sex}:</td>
				<td>
					{if $oUserProfile->getProfileSex()=='man'}
						{$aLang.profile_sex_man}
					{else}
						{$aLang.profile_sex_woman}
					{/if}
				</td>
			</tr>
		{/if}

		{if $oUserProfile->getProfileBirthday()}
			<tr>
				<td class="var">{$aLang.profile_birthday}:</td>
				<td>{date_format date=$oUserProfile->getProfileBirthday() format="j F Y"}</td>
			</tr>
		{/if}

		{if ($oUserProfile->getProfileCountry()|| $oUserProfile->getProfileRegion() || $oUserProfile->getProfileCity())}
			<tr>
				<td class="var">{$aLang.profile_place}:</td>
				<td>
				{if $oUserProfile->getProfileCountry()}
					<a href="{router page='people'}country/{$oUserProfile->getProfileCountry()|escape:'html'}/">{$oUserProfile->getProfileCountry()|escape:'html'}</a>{if $oUserProfile->getProfileCity()},{/if}
				{/if}
				{if $oUserProfile->getProfileCity()}
					<a href="{router page='people'}city/{$oUserProfile->getProfileCity()|escape:'html'}/">{$oUserProfile->getProfileCity()|escape:'html'}</a>
				{/if}
				</td>
			</tr>
		{/if}

		{if $oUserProfile->getProfileSite()}
			<tr>
				<td class="var">{$aLang.profile_site}:</td>
				<td>
					<a href="{$oUserProfile->getProfileSite(true)|escape:'html'}" rel="nofollow">
						{if $oUserProfile->getProfileSiteName()}
							{$oUserProfile->getProfileSiteName()|escape:'html'}
						{else}
							{$oUserProfile->getProfileSite()|escape:'html'}
						{/if}
					</a>
				</td>
			</tr>
		{/if}
                {if count($aUserFields)}
                    {foreach from=$aUserFields item=oField}
                        <tr>
                            <td class="var">{$oField->getTitle()|escape:'html'}:</td>
                            <td>{$oField->getValue(true,true)}</td>
                        </tr>
                    {/foreach}
                {/if}
		{hook run='profile_whois_privat_item' oUserProfile=$oUserProfile}
	</table>
{/if}

{hook run='profile_whois_item' oUserProfile=$oUserProfile}

{if $extra.participate}
	{if $extra.blog_lj OR $extra.blog_blogger OR $extra.blog_other}
		<h2 class="user-profile-header"><span>Мои блоги</span></h2>
		<table class="user-profile-table extra">

			{if $extra.blog_lj}
				<tr>
					<td class="var"><span class="lj"></span>Livejournal:</td>
					<td>{$extra.blog_lj}</td>
				</tr>
			{/if}

			{if $extra.blog_blogger}
				<tr>
					<td class="var"><span class="bl"></span>Blogger:</td>
					<td>{$extra.blog_blogger}</td>
				</tr>
			{/if}

			{if $extra.blog_other}
				<tr>
					<td class="var"><span class="other"></span>Другой блог:</td>
					<td>{$extra.blog_other}</td>
				</tr>
			{/if}
			
		</table>
	{/if}

	{if $oUserProfile->getProfileIcq() OR $extra.profile_twitter OR $extra.profile_fb OR $extra.profile_vk OR $extra.profile_skype}
		<h2 class="user-profile-header"><span>Другие аккаунты</span></h2>
		<ul class="extra">

			{if $oUserProfile->getProfileIcq()}
				<li><span class="icq"></span>{$oUserProfile->getProfileIcq()}</li>
			{/if}

			{if $extra.profile_twitter}
				<li><span class="tw"></span><a href="{$extra.profile_twitter}">Twitter</a></li>
			{/if}

			{if $extra.profile_fb}
				<li><span class="fb"></span><a href="{$extra.profile_fb}">Facebook</a></li>
			{/if}

			{if $extra.profile_vk}
				<li><span class="vk"></span><a href="{$extra.profile_vk}">Вконтакте</a></li>
			{/if}

			{if $extra.profile_skype}
				<li><span class="sk"></span><a href="skype:{$extra.profile_skype}">Skype</a></li>
			{/if}

		</ul>
	{/if}
{/if}

{if $oUserProfile->getProfileAbout()}
<h2 class="user-profile-header"><span>{$aLang.profile_about}</span></h2>
<table class="user-profile-table">
		<tr>
		<td>{$oUserProfile->getProfileAbout()|escape:'html'}</td>
	</tr>
</table>
{/if}


<h2 class="user-profile-header"><span>{$aLang.profile_activity}</span></h2>
<table class="user-profile-table">
	{if $aUsersFriend}
		<tr>
			<td class="var">{$aLang.profile_friends}:</td>
			<td class="friends-list-exp">
				<ul class="user-list">
				{foreach from=$aUsersFriend item=oUser}
					<li>
						<a href="{$oUser->getUserWebPath()}" class="avatar"><img src="{$oUser->getProfileAvatarPath(24)}"></a>
						<a href="{$oUser->getUserWebPath()}" class="user">{$oUser->getLogin()}</a>
					</li>
				{/foreach}
				</ul>
			</td>
		</tr>
	{/if}

	{if $oConfig->GetValue('general.reg.invite') and $oUserInviteFrom}
		<tr>
			<td class="var">{$aLang.profile_invite_from}:</td>
			<td>
				<a href="{$oUserInviteFrom->getUserWebPath()}">{$oUserInviteFrom->getLogin()}</a>&nbsp;
			</td>
		</tr>
	{/if}

	{if $oConfig->GetValue('general.reg.invite') and $aUsersInvite}
		<tr>
			<td class="var">{$aLang.profile_invite_to}:</td>
			<td>
				{foreach from=$aUsersInvite item=oUserInvite}
					<a href="{$oUserInvite->getUserWebPath()}">{$oUserInvite->getLogin()}</a>&nbsp;
				{/foreach}
			</td>
		</tr>
	{/if}

	{if $aBlogsOwner}
		<tr>
			<td class="var">{$aLang.profile_blogs_self}:</td>
			<td>
				{foreach from=$aBlogsOwner item=oBlog name=blog_owner}
					<a href="{router page='blog'}{$oBlog->getUrl()}/">{$oBlog->getTitle()|escape:'html'}</a>{if !$smarty.foreach.blog_owner.last}, {/if}
				{/foreach}
			</td>
		</tr>
	{/if}

	{if $aBlogAdministrators}
		<tr>
			<td class="var">{$aLang.profile_blogs_administration}:</td>
			<td>
				{foreach from=$aBlogAdministrators item=oBlogUser name=blog_user}
					{assign var="oBlog" value=$oBlogUser->getBlog()}
					<a href="{router page='blog'}{$oBlog->getUrl()}/">{$oBlog->getTitle()|escape:'html'}</a>{if !$smarty.foreach.blog_user.last}, {/if}
				{/foreach}
			</td>
		</tr>
	{/if}

	{if $aBlogModerators}
		<tr>
			<td class="var">{$aLang.profile_blogs_moderation}:</td>
			<td>
				{foreach from=$aBlogModerators item=oBlogUser name=blog_user}
					{assign var="oBlog" value=$oBlogUser->getBlog()}
					<a href="{router page='blog'}{$oBlog->getUrl()}/">{$oBlog->getTitle()|escape:'html'}</a>{if !$smarty.foreach.blog_user.last}, {/if}
				{/foreach}
			</td>
		</tr>
	{/if}

	{if $aBlogUsers}
		<tr>
			<td class="var">{$aLang.profile_blogs_join}:</td>
			<td>
				{foreach from=$aBlogUsers item=oBlogUser name=blog_user}
					{assign var="oBlog" value=$oBlogUser->getBlog()}
					<a href="{router page='blog'}{$oBlog->getUrl()}/">{$oBlog->getTitle()|escape:'html'}</a>{if !$smarty.foreach.blog_user.last}, {/if}
				{/foreach}
			</td>
		</tr>
	{/if}

	{hook run='profile_whois_activity_item' oUserProfile=$oUserProfile}

	<tr>
		<td class="var">{$aLang.profile_date_registration}:</td>
		<td class="no-pdng">{date_format date=$oUserProfile->getDateRegister()}</td>
	</tr>

	{if $oSession}
		<tr>
			<td class="var">{$aLang.profile_date_last}:</td>
			<td class="no-pdng">{date_format date=$oSession->getDateLast()}</td>
		</tr>
	{/if}
</table>


{include file='footer.tpl'}