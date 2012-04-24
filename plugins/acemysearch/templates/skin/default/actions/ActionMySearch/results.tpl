{include file='header.tpl' showWhiteBack=true}

<h1>{$aLang.search_results}: <span>{$aReq.q|escape:'html'}</span></h1>
<ul class="block-nav switcher">
  <li {if $aReq.sType == 'topics'}class="active"{/if}>
    <strong></strong>
    <a href="{router page=search}topics/?q={$aReq.q|escape:'html'}">{$aLang.search_found_topics}{if $aReq.sType == 'topics'} ({$aRes.count}){/if}</a>
  </li>
  <li {if $aReq.sType == 'comments'}class="active"{/if}>
    <a href="{router page=search}comments/?q={$aReq.q|escape:'html'}">{$aLang.search_found_comments}{if $aReq.sType == 'comments'} ({$aRes.count}){/if}</a>
  </li>
  <li {if $aReq.sType == 'blogs'}class="active"{/if}>
    <a href="{router page=search}blogs/?q={$aReq.q|escape:'html'}">{$aLang.search_found_blogs}{if $aReq.sType == 'blogs'} ({$aRes.count}){/if}</a>
    <em></em>
  </li>
</ul>
<br />

{if $bIsResults}
  {if $aReq.sType == 'topics'}
    {include file="$sTemplatePathAction/topic_list.tpl"}
  {elseif $aReq.sType == 'comments'}
    {include file="$sTemplatePathAction/comment_list.tpl"}
  {elseif $aReq.sType == 'blogs'}
    {include file="$sTemplatePathAction/blog_list.tpl"}
  {/if}
{else}
<h2>{$aLang.search_results_empty}</h2> 
{/if}

{include file='footer.tpl'}