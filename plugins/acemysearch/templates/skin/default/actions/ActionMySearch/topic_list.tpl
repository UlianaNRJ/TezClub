{if count($aTopics)>0}

{foreach from=$aTopics item=oTopic}
{assign var="oBlog" value=$oTopic->getBlog()}
{assign var="oUser" value=$oTopic->getUser()}
<div class="comments padding-none">
    <div class="comment">
        <div class="comment-topic"><a href="{$oTopic->getUrl()}">{$oTopic->getTitle()|escape:'html'}</a> / <a href="{$oBlog->getUrlFull()}" class="comment-blog">{$oTopic->getBlogTitle()|escape:'html'}</a> <a href="{$oTopic->getUrl()}#comments" class="comment-total">{$oTopic->getCountComment()}</a></div>
        <div class="voting {if $oTopic->getRating()>0}positive{elseif $oTopic->getRating()}negative{/if}">
            <div class="total">{if $oTopic->getRating()>0}+{/if}{$oTopic->getRating()}</div>
        </div>
        <div class="content">
            <div class="tb"><div class="tl"><div class="tr"></div></div></div>
            <div class="text">
                {$oTopic->getTextShort()}
            </div>
            <div class="bl"><div class="bb"><div class="br"></div></div></div>
        </div>
        <div class="info">
            <a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt="{$oUser->getLogin()}" class="avatar" /></a>
            <p><a href="{$oUser->getUserWebPath()}" class="author">{$oUser->getLogin()}</a></p>
            <ul>
                <li class="date">{date_format date=$oTopic->getDateAdd()}</li>
                <li>
                    &rarr;&nbsp;<a href="{$oTopic->getUrl()}">{$oTopic->getUrl()}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
{/foreach}
{/if}

{include file='paging.tpl'}