{include file='header.tpl' menu='settings' showWhiteBack=true}
	{literal}
	<script language="JavaScript" type="text/javascript">
	function Cleaner() {
		ls.ajax(aRouter['settings']+'cleaner/clean/',{},function(result) {
			if (result.bStateError) {
				ls.msg.error(null, result.sMsg);
			} else {
				ls.msg.notice(null, result.sMsg);
			}
		});
  }
	</script>
	{/literal}
<input type="button" value="{$aLang.cleaner_button}" onclick="Cleaner();">


{include file='footer.tpl'}
