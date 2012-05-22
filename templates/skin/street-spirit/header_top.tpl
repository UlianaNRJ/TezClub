<div id="logo-line" style="overflow: auto; width: 100%;">
    <div class="logo-line-inside" style="float:left; width: 40%;">
        <a href="{cfg name='path.root.web'}" class="logo">Tez<span>Club</span><font color="lightgrey">International</font></a>
        <a href="http://hotels.tezclub.com.ua/" class="logohref button blue corners ib">Bloggers in hotels</a>
    </div>
	<div class="nav-inner">
        {if $oUserCurrent}
            <div class="profile">
                <a href="{$oUserCurrent->getUserWebPath()}"><img src="{$oUserCurrent->getProfileAvatarPath(48)}" alt="{$oUserCurrent->getLogin()}" class="avatar" /></a>
               <a href="{$oUserCurrent->getUserWebPath()}" class="username">
                        {if $oUserCurrent->getProfileName()}
                            {$oUserCurrent->getProfileName()}
                        {else}
                            {$oUserCurrent->getLogin()}
                        {/if}
                    </a>
                <a href="{router page='talk'}" id="new_messages" class="message"></a>
                    {if $iUserCurrentCountTalkNew}
                        <a href="{router page='talk'}" class="new-message" id="new_messages" title="{$aLang.user_privat_messages_new}"><span class="message"></span>Новых сообщений: {$iUserCurrentCountTalkNew}</a>
                    {/if}
                    <br/>
                    <span class="user-conf">
                    <a href="{router page='settings'}profile/" class="author">{$aLang.user_settings}</a> | <a href="{router page='login'}exit/?security_ls_key={$LIVESTREET_SECURITY_KEY}" class="author" >{$aLang.exit}</a></span>

                    <span class="user-rating">{$aLang.user_rating} <strong>{$oUserCurrent->getRating()}</strong></span>

                {hook run='userbar_item'}
            </div>
        {else}
            <div class="user-menu">
                <a class="button white corners login_form_show" href="{router page='login'}">{$aLang.user_login_submit}</a>
                <span>{$aLang.or}</span>
                <a class="button white corners" href="{router page='registration'}">{$aLang.registration_submit}</a>
            </div>
        {/if}
    </div>
</div>
<div id="header">
    <div class="header-inside">
        <div class="search-form">
            <form action="{router page='search'}topics/" method="get" class="search">
                <div>
                    <input class="text" type="text" value="" name="q" />
                    <input class="search-submit" type="submit" value="" />
                </div>
            </form>
        </div>
        <span class="search-label">поиск:</span>

        <ul class="pages">
            <li {if $sMenuHeadItemSelect=='blog'}class="active"{/if}><a href="{cfg name='path.root.web'}">Главное</a></li>
            <li {if $sMenuHeadItemSelect=='blogs'}class="active"{/if}><a href="{router page='blogs'}">{$aLang.blogs}</a></li>
			<li><a href="{router page='tag/Советы'}">Советы</a></li>
			{*<li><a href="/your_tour.php">Мой тур</a></li>*}
            <li {if $sMenuHeadItemSelect=='people'}class="active"{/if}><a href="{router page='people'}">{$aLang.people}</a></li>
            {if $oUserCurrent}
            <li {if $sMenuItemSelect=='stream'}class="active"{/if}>
                <a href="{router page='stream'}">{$aLang.stream_personal_title}</a>
            </li>
            {/if}
            {hook run='main_menu'}
        </ul>
    </div>
</div>