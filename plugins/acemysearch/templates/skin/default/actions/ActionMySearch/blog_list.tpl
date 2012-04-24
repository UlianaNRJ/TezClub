{if count($aBlogs)>0}
{foreach from=$aBlogs item=oBlog}
{assign var="oUser" value=$oBlog->getOwner()}
<div class="comments padding-none">
    <div class="comment">
        <div class="comment-topic"><a href="{$oBlog->getUrlFull()}">{$oBlog->getTitle()|escape:'html'}</a></div>
        <div class="content">
            <div class="tb"><div class="tl"><div class="tr"></div></div></div>
            <div class="text">
                {$oBlog->getDescription()}
            </div>
            <div class="bl"><div class="bb"><div class="br"></div></div></div>
        </div>
        <div class="info">
            <a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt="{$oUser->getLogin()}" class="avatar" /></a>
            <p><a href="{$oUser->getUserWebPath()}" class="author">{$oUser->getLogin()}</a></p>
            <ul>
                <li class="date">{date_format date=$oBlog->getDateAdd()}</li>
                <li>
                    &rarr;&nbsp;<a href="{$oBlog->getUrlFull()}">{$oBlog->getUrlFull()}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{/foreach}
{/if}

{include file='paging.tpl'}