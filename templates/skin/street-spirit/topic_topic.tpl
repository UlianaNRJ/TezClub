Мне нравится{assign var="oBlog" value=$oTopic->getBlog()}
{assign var="oUser" value=$oTopic->getUser()}
{assign var="oVote" value=$oTopic->getVote()}

<div class="topic">
    <div class="user-title">
        <a href="{$oBlog->getUrlFull()}" class="title-blog">{$oBlog->getTitle()|escape:'html'}</a>
    </div>
    <h1 class="title">
        {if $oTopic->getPublish()==0}
        <img src="{cfg name='path.static.skin'}/images/draft.png" title="{$aLang.topic_unpublish}" alt="{$aLang.topic_unpublish}" />
        {/if}
        {if $bTopicList}
        <a href="{$oTopic->getUrl()}" class="title-topic">{$oTopic->getTitle()|escape:'html'}</a>
        {else}
        {$oTopic->getTitle()|escape:'html'}
        {/if}
        <a href="#" onclick="return ls.favourite.toggle({$oTopic->getId()},this,'topic');" class="favourite {if $oUserCurrent && $oTopic->getIsFavourite()}active{/if}">
            <span class="favourite-count" id="fav_count_topic_{$oTopic->getId()}">{if $oTopic->getCountFavourite()>0}{$oTopic->getCountFavourite()}{else}&nbsp;{/if}</span>
        </a>
    </h1>
    {if $oUserCurrent and ($oUserCurrent->isAdministrator() or $oBlog->getUserIsAdministrator() or $oBlog->getOwnerId()==$oUserCurrent->getId() or $oUserCurrent->getId()==$oTopic->getUserId() or $oBlog->getUserIsModerator())}
    <div class="info-top">
        <span class="actions">
            {if $oUserCurrent->getId()==$oTopic->getUserId() or $oUserCurrent->isAdministrator() or $oBlog->getUserIsAdministrator() or $oBlog->getUserIsModerator() or $oBlog->getOwnerId()==$oUserCurrent->getId()}
                <a href="{cfg name='path.root.web'}/{$oTopic->getType()}/edit/{$oTopic->getId()}/" title="{$aLang.topic_edit}" class="edit">{$aLang.topic_edit}</a>
            {/if}
            {if $oUserCurrent->isAdministrator() or $oBlog->getUserIsAdministrator() or $oBlog->getOwnerId()==$oUserCurrent->getId()}
            <a href="{router page='topic'}delete/{$oTopic->getId()}/?security_ls_key={$LIVESTREET_SECURITY_KEY}" title="{$aLang.topic_delete}"
               onclick="return confirm('{$aLang.topic_delete_confirm}');" class="delete">{$aLang.topic_delete}</a>
            {/if}
        </span>
    </div>
    {/if}
    <div class="content">
        {if $bTopicList}
        {$oTopic->getTextShort()}
        {if $oTopic->getTextShort()!=$oTopic->getText()}
        <br /><br /><a href="{$oTopic->getUrl()}#cut" title="{$aLang.topic_read_more}" class="content-more"><span>
                {if $oTopic->getCutText()}
                {$oTopic->getCutText()}
                {else}
                {$aLang.topic_read_more}
                {/if}
            </span> →</a>
        {/if}
        {else}
        {$oTopic->getText()}
        {/if}
    </div>



    <ul class="tags">
        {foreach from=$oTopic->getTagsArray() item=sTag name=tags_list}
        <li><a href="{router page='tag'}{$sTag|escape:'url'}/">{$sTag|escape:'html'}</a>{if !$smarty.foreach.tags_list.last} {/if}</li>
        {/foreach}
    </ul>



    <ul class="info">
        <li class="username">
            <a href="{$oUser->getUserWebPath()}"><img src="{$oUser->getProfileAvatarPath(24)}" alt="{$oUser->getLogin()}" class="avatar" /></a>
            <a href="{$oUser->getUserWebPath()}">{$oUser->getLogin()}</a>,
        </li>
        <li class="date">{date_format date=$oTopic->getDateAdd()}</li>
        {if $bTopicList}
        <li class="comments-counter">
            {if $oTopic->getCountComment()>0}
            <a href="{$oTopic->getUrl()}#comments" title="{$aLang.topic_comment_read}"><span class="comments-counter-ico">&nbsp;</span>{$oTopic->getCountComment()}{if $oTopic->getCountCommentNew()}<span>+{$oTopic->getCountCommentNew()}</span>{/if}</a>
            {else}
            <a href="{$oTopic->getUrl()}#comments" title="{$aLang.topic_comment_add}"><span class="comments-counter-ico">&nbsp;</span>{$aLang.topic_comment_add}</a>
            {/if}
        </li>
        {/if}

        {assign var="bVoteAllow" value=1}
        {if ($oUserCurrent && $oTopic->getUserId()==$oUserCurrent->getId())
        || strtotime($oTopic->getDateAdd())<$smarty.now-$oConfig->GetValue('acl.vote.topic.limit_time')}
        {assign var="bVoteAllow" value=0}
        {/if}
        <li {if !$oVote && $bVoteAllow}style="display:none;" {/if}class="vote-counter" id="vote_area_res_topic_{$oTopic->getId()}">

        </li>
        <li {if $oVote || !$bVoteAllow}style="display: none;" {/if}id="vote_area_btn_topic_{$oTopic->getId()}" class="voting-line {if $oVote || !$bVoteAllow}{if $oTopic->getRating()>0}positive{elseif $oTopic->getRating()<0}negative{/if}{/if} {if !$oUserCurrent || !$bVoteAllow}guest{/if}{if $oVote} voted {if $oVote->getDirection()>0}plus{elseif $oVote->getDirection()<0}minus{/if}{/if}">

        </li>
             

        {hook run='topic_show_info' topic=$oTopic}
    </ul>
    <div class="share-line">
        <div class="fl mrt_small2 share-line-twitter">
            <a href="https://twitter.com/share" class="twitter-share-button"
               data-url="{$oTopic->getUrl()}"
               data-text="{$oTopic->getTitle()|escape:'html'}" data-lang="ru">Твитнуть</a>
        </div>

        <div class="fl mrt_small2 share-line-odnokl">
            <a class="odkl-klass" href="{$oTopic->getUrl()}" onclick="voteOdnoklassniki(this);return false;" ></a>
        </div>

        <div class="fl mrt_small2">
        <!-- Put this script tag to the place, where the Share button will be -->
        {literal}
        <!-- Put this script tag to the place, where the Share button will be -->
        <script type="text/javascript"><!--
        document.write(VK.Share.button({url: "{/literal}{$oTopic->getUrl()}{literal}", 
        title: "{/literal}{$oTopic->getTitle()|escape:'html'}{literal}"},{type: "round", text: "Мне нравится"}));
        --></script>
        {/literal}
        </div>

        <div class="fl mrt_small2 facebook-cont">
            <div class="fb-like" data-href="{$oTopic->getUrl()}" data-action="like" data-show-faces="true" data-width="125" data-layout="button_count" data-send="false"></div>
        </div>
        

    </div>
    {if !$bTopicList}
    {hook run='topic_show_end' topic=$oTopic}
    {/if}
</div>