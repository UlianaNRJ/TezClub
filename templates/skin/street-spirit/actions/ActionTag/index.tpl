{include file='header.tpl'}
<h1 class="page-title" style="font:bold 38px/35px  'Helvetica Neue', arial, sans-serif; margin:0 0 20px 0;">{$sTag|escape:'html'}</h1>
<!---<form action="" method="get" class="tags-search" id="tag_search_form">
	<div class="tags-search-wrap"><input type="text" name="tag" value="{$sTag|escape:'html'}" class="tags-input"  id="tag_search"></div>
	<input type="submit" name="" class="tags-search-submit">
</form>--->


{include file='topic_list.tpl'}
{include file='footer.tpl'}